<?php

namespace App\Application\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayWith {

    private $order;
    private $amount;
    private $type;
    private $numberOfUsers;
    private $user;
    private $event;
    private $currency;
    private $certificates;
    private $course;
    private $amount_cents;
    private $subType;

    private $success = true;
    private $payment_token = null;
    private $error_message = null;
    private $redirect_url = null;
    private $html = null;
    private $payment_id = null;




    
    public function __construct(Request $request)
    {
        $this->order = ($request->order) ? Orders::findOrFail($request->order) : getCurrentCartOrder();
        $this->amount = ($request->amount) ? $request->amount : null;
        $this->type = null;
        $this->numberOfUsers = ($request->numberOfUsers) ? $request->numberOfUsers : null;
        $this->user = null;
        $this->currency = ($request->currency) ? $request->currency : getCurrency(); // TODO
        $this->certificates = ($request->Certificates) ? $request->Certificates : null;
        parse_str($request->Certificates, $this->certificates);
        $this->course = ($request->courses_id) ? Courses::findOrFail($request->courses_id) : null;
        $this->event = ($request->events_id) ? Events::findOrFail($request->events_id) : null;
        $this->amount_cents = null;
        $this->subType = ($request->subType) ? $request->subType : null;
    }
    
    public function results(){
        $data['success'] = $this->success;
        $data['token'] = $this->payment_token;
        $data['order'] = $this->order;
        $data['amount'] = $this->amount;
        $data['error_message'] = $this->error_message;
        $data['html'] = $this->html;
        $data['payment_id'] = $this->payment_id;
        $data['redirect_url'] = $this->redirect_url;

        return $data;
    }

    public function visa(){
        $this->setupOrderAndAmount(Orders::METHOD_PAYMOB);
        if ($this->order->accept_status) {
            $this->order = $this->dublicateOrderPositions($this->order->id);
        }
        $visa = new AcceptPaymentsIntegration;
        $result = $visa->init($this->order, $this->amount_cents);
        // $data['success'] = true;
        if (!$result) {
            // $data['success'] = false;
            $this->success = false;
        }
        // save accept_status in order
        $this->order->accept_status = 1;
        $this->order->save();
        if(env('APP_ENV') != "local"){
            $facebookConversionsApi = new FacebookConversionsAPI();
            $facebookConversionsApi->pushEvent(FacebookConversionsAPI::EVENT_INITIATECHECKOUT, $this->order);
        }

        $this->payment_token = $result;
        $this->amount = (int) $this->amount_cents / 100;
        
        return $this->results();

    }
    public function hyperpay(){
        $this->setupOrderAndAmount(Orders::METHOD_PAYMOB);

        if ($this->order->accept_status) {
            $this->order = $this->dublicateOrderPositions($this->order->id);
        }


//        $visa = new AcceptPaymentsIntegration;
//        $result = $visa->init($this->order, $this->amount_cents);
//        // $data['success'] = true;

        $paymentName = 'HyperPay';
        $payment = new \Nafezly\Payments\Factories\PaymentFactory();


        $payment = $payment->get($paymentName)->pay(
            ceil($this->amount_cents / 100),
            $user_id = Auth::user()->id,
            $user_first_name = Auth::user()->name ?? '',
            $user_last_name = Auth::user()->name ?? '',
            $user_email = Auth::user()->email ?? '',
            $user_phone = Auth::user()->mobile ?? '',
            $source = 'MADA'
        );

        if (!isset($payment)) {
            // $data['success'] = false;
            $this->success = false;
        }
        // save accept_status in order
        $this->order->accept_order_id =  $payment['payment_id'];
        $this->order->accept_status = 1;
        $this->order->save();


        if(env('APP_ENV') != "local"){
//            $facebookConversionsApi = new FacebookConversionsAPI();
//            $facebookConversionsApi->pushEvent(FacebookConversionsAPI::EVENT_INITIATECHECKOUT, $this->order);
        }

        $html = $payment['html'];


        $this->payment_id =  $payment['payment_id'] ;
        $this->type =  'hyperpay' ;
        $this->html =  $html ;
        $this->amount = (int) $this->amount_cents / 100;

        return $this->results();
    }


    static function dublicateOrderPositions($Order_id)
    {
        $oldOrder = Orders::where('user_id', Auth::user()->id)->where('id', $Order_id)->with('ordersposition')->orderBy('id', 'DESC')->first();
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
        $oldOrder->save();


        return $newOrder;
    }

    private function setupOrderAndAmount($method){
        //Cart Page
        $this->amount_cents = Currencies::getAmountcentsByCurrencyID($this->currency , Currencies::DEFUALT_CURRENCY, getShoppingCartCost());

        //Direct Pay - Course Page
        if($this->course){
            if(isset($this->certificates['Certificates'])){
                $this->order = createDirectPayOrder($this->course, $this->certificates['Certificates']);
            }else{
                $this->order = createDirectPayOrder($this->course);
            }
            $this->amount_cents = calculateExchangeRate($this->currency, $this->order->TotalOrderAmount, $method);
        }elseif($this->amount){
            //Direct Pay - Offline
            $this->amount_cents = calculateExchangeRate($this->currency, $this->amount, $method);
        }elseif($this->subType && !$this->numberOfUsers){
            //B2C Subscription
            $this->order = createBusinessInitialOrder($this->subType ,Orders::TYPE_B2C, $this->amount, $this->currency);
            $this->amount_cents = Currencies::getAmountcentsByCurrencyID($this->currency , Currencies::DEFUALT_CURRENCY, ceil($this->order->TotalOrderAmount) * 100);

        }elseif($this->subType && $this->numberOfUsers){
            //B2B Subscription
            $this->order = createB2bInitialOrder($this->subType, $this->numberOfUsers, $this->amount, $this->currency);
            $this->amount_cents = calculateExchangeRate($this->currency, (ceil($this->order->TotalOrderAmount) * 100), $method);

        }

    }


}