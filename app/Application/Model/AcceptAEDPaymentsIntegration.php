<?php
namespace App\Application\Model;

use Illuminate\Support\Facades\Auth;

class AcceptAEDPaymentsIntegration extends PaymentIntegrations{

    const ACCEPT_INTEGRATION_ID = 20248;  //   card integration_id test = 14012  live = 14469 will be provided upon signing up, test

    const ACCEPT_Secret_key = 'are_sk_test_124a8359b6f8e4e643f2b0803c94e22815437662a10365d8d91c94b265d6e204';
    const ACCEPT_Public_key = 'are_pk_test_LnlrFPQo2GnXRxd3zsIglqHsbARGdYfM';
    const ACCEPT_ORDER_URL = 'https://uae.paymob.com/v1/intention/';
    const ACCEPT_Retrieve_Intention_API_URL = 'https://uae.paymob.com/v1/intention/element/';
    const ACCEPT_API_KEY = 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2TVRBek1qSXNJbTVoYldVaU9pSnBibWwwYVdGc0luMC5WUlVESkdVSEsxQW9TX0VqeUhLMDgteFA4V3g3cWd5bDI1d3RLdUtFbmR4ekFLcGE3RGJWSjZHSGxmX2NHWmpzTlgtOW1Talh4Z1dJdk5RVVBtUnI4Zw==';

    protected function callAPI($postdata, $URL, $token=null)
    {

        $curl = curl_init();

        if($token){

            curl_setopt_array($curl, array(
                CURLOPT_URL => $URL,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $postdata,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Token " . self::ACCEPT_Secret_key,
                    "Content-Type: application/json"
                ),
            ));

        }else{

            curl_setopt_array($curl, array(
                CURLOPT_URL => $URL,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));

        }

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        return $result ;

    }

    function acceptOrderCreation($order, $amount_cents)
    {

        $data = array(
            "amount" => $amount_cents, // auth token obtained from step1
            "currency" => "AED",
            "payment_methods" => [self::ACCEPT_INTEGRATION_ID],
            "items" => [
                array(
                "name" => "IGTS Course",
                "amount" => $amount_cents,
                "description" => "NA",
                "quantity" => 1,
                    )
                ],
            "billing_data" => array(
                "apartment" => "NA",
                "email" => (Auth::user()->email) ? Auth::user()->email : 'NA',
                "floor" => "NA",
                "first_name" => (Auth::user()->name) ? Auth::user()->name : 'NA',
                "last_name" => (Auth::user()->name) ? Auth::user()->name : 'NA',
                "street" => "NA",
                "building" => "NA",
                "phone_number" => (Auth::user()->mobile) ? Auth::user()->mobile : 'NA',
                "city" => "NA",
                "country" => "NA",
                "state" => "NA"
            ),
            "extras" => array(
                "order" => array(
                    "order_id" => $order->id,
                    "order_amount" => $amount_cents
                ),
            ),
            "special_reference"=> $order->id
        );

        $postdata = json_encode($data);
        $token = self::ACCEPT_Secret_key;


        $acceptOrderCreation = $this->callAPI($postdata, self::ACCEPT_ORDER_URL, $token);


        if(!isset($acceptOrderCreation['payment_keys'])){
            $oldOrder = Orders::where('user_id', Auth::user()->id)->where('id', $order->id)->with('ordersposition')->orderBy('id', 'DESC')->first();
            $oldOrder->load('ordersposition');


            $newOrder = $oldOrder->replicate();
            $newOrder->accept_status = 0;
            $newOrder->accept_order_id = null;
            $newOrder->save();


            foreach ($oldOrder->ordersposition as $option) {
                $new_option = $option->replicate();
                $new_option->orders_id = $newOrder->id;
                $new_option->push();
            }
            // dd($newOrder);
            $oldOrder->status = Orders::STATUS_FAILED;
            $oldOrder->comments = $acceptOrderCreation;
            $oldOrder->save();

            $this->acceptOrderCreation($newOrder, $amount_cents);

        }

        if (!isset($acceptOrderCreation['id'])) {

            alert()->info(trans('website.Wrong'), trans('website.Error Message'));
            //return redirect('/cart');
            return;
        }

        // save accept_order_id in order

        $order->accept_order_id = $acceptOrderCreation['id'];
        $order->accept_order_client_secret = $acceptOrderCreation['client_secret'];
        $order->save();

        return $acceptOrderCreation['payment_keys'][0]['key'];

    }


    function acceptPayRequest($payment_token){

        $data = array(

            "client_secret_key" => $payment_token, // token obtained in step 3
            "public_key" => self::ACCEPT_Public_key ,
        );
        $postdata = json_encode($data);

        $result = $this->callAPI($postdata, self::ACCEPT_Retrieve_Intention_API_URL.'/'.self::ACCEPT_Public_key.'/'.$payment_token);

        return $result;

    }

    public function init($order, $amount_cents, $paymentType=null, $identifier=null)
    {
            //STEP 1 - Accept Order Creation
        $result = $this->acceptOrderCreation($order, $amount_cents);
            if(!$result){
                alert()->info(trans('website.Wrong'), trans('website.Error Message'));
                return;
            }


//        //STEP 2 - Accept Order Creation
//        $token = $this->acceptPayRequest($result);
//
//        if(!$token['payment_keys']['card']){
//            alert()->info(trans('website.Wrong'), trans('website.Error Message'));
//            return;
//        }

        // Go to step 4 if payment is not visa/mastercard
//        if(isset($paymentType)){
//            //STEP 4 - Accept Pay Request
//            $result = $this->acceptPayRequest($result, $paymentType, $identifier);
//        }


        return $result;


    }

}