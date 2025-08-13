<?php
namespace App\Application\Model;

use DateTime;
use Illuminate\Support\Facades\Auth;

class FacebookConversionsAPI{

    const ACCESS_TOKEN = "EAAEucjw9ZBWABALwyncsu6Ojo7Rhyxp72wuNVI6osjTHKi8vNOZCKhoUSP0oQ1TaIDEDHhHYxwqOMSVUCJ8Petwyf7fMk04Qt1ZBp1TKy0bSbEYB3ZAVC6WEsqe5bR7paz10yQs98bc3WiIQKhOyCblnCaXNi8mhX9rStg4MAXPy6JfbZB5VZA5nBCFVfX3wAZD";
    const PIXEL_ID = "545410489200191";
    const EVENT_PURCHASE = "Purchase";
    const EVENT_ADDTOCART = "InitialAddToCart";
    const EVENT_INITIATECHECKOUT = "Initiate checkout";
    const EVENT_SIGNINSIGNUP = "Sign-In&Sign-Up";
    const EVENT_CONTACT = "Contact";

    protected function callAPI($data){

        $postdata = json_encode($data);
        $curl = curl_init();
       
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://graph.facebook.com/v22.0/" . FacebookConversionsAPI::PIXEL_ID . "/events?access_token=" . FacebookConversionsAPI::ACCESS_TOKEN,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postdata,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));
    
        $response = curl_exec($curl);
        curl_close($curl);
    
        $result = json_decode($response, true);
        return $result ;

    }

    function purchaseEvent($date, $currentPage, $order){
        if(!$date || !$currentPage || !$order){
            return "Missing Data";
        }

        $data = array(
            "data" => array(
                0 => array(
                    "event_name" => FacebookConversionsAPI::EVENT_PURCHASE,
                    "event_id" => 'Purchase.' . Auth::user()->id,
                    "event_time" => $date->getTimestamp(),
                    "action_source" => "website",
                    "event_source_url" => $currentPage,
                    "user_data" => array(
                        "em" => hash("SHA256",(Auth::check() ? Auth::user()->email : null)),
                        "ph" => hash("SHA256",(Auth::check() && Auth::user()->phone) ? Auth::user()->mobile : null),
                        "client_user_agent" => $_SERVER["HTTP_USER_AGENT"],
                        'client_ip_address' => null,
                    ),
                    "custom_data" => array(
                        "value" => $order->payments->amount,
                        "currency" => "EGP",
                    ),
                )
            ),
            //'test_event_code' => 'TEST51300', // for development test only
    
        );

        return $this->callAPI($data);
        
    }

    function addToCartEvent($date, $currentPage){
        if(!$date || !$currentPage){
            return "Missing Data";
        }


        $data = array(
            "data" => array(
                0 => array(
                    "event_name" => FacebookConversionsAPI::EVENT_ADDTOCART,
                    "event_id" => 'Add to cart.' . Auth::user()->id,
                    "event_time" => $date->getTimestamp(),
                    "action_source" => "website",
                    "event_source_url" => $currentPage,
                    "user_data" => array(
                        "em" => hash("SHA256",(Auth::check() ? Auth::user()->email : null)),
                        "ph" => hash("SHA256",(Auth::check() && Auth::user()->phone) ? Auth::user()->mobile : null),
                        "client_user_agent" => $_SERVER["HTTP_USER_AGENT"],
                        'client_ip_address' => null,
                    ),
                )
            ),
            //'test_event_code' => 'TEST51300', // for development test only
    
        );

        return $this->callAPI($data);

    }

    function initiateCheckout($date, $currentPage){

        if(!$date || !$currentPage){
            return "Missing Data";
        }


        $data = array(
            "data" => array(
                0 => array(
                    "event_name" => FacebookConversionsAPI::EVENT_INITIATECHECKOUT,
                    "event_id" => 'Checkout.' . Auth::user()->id,
                    "event_time" => $date->getTimestamp(),
                    "action_source" => "website",
                    "event_source_url" => $currentPage,
                    "user_data" => array(
                        "em" => hash("SHA256",(Auth::check() ? Auth::user()->email : null)),
                        "ph" => hash("SHA256",(Auth::check() && Auth::user()->phone) ? Auth::user()->mobile : null),
                        "client_user_agent" => $_SERVER["HTTP_USER_AGENT"],
                        'client_ip_address' => null,
                    ),
                )
            ),
            //'test_event_code' => 'TEST51300', // for development test only
    
        );

        return $this->callAPI($data);
    }

    public function signInSignUpEvent($date, $currentPage){

        if(!$date || !$currentPage){
            return "Missing Data";
        }

if(Auth::check()){

        $data = array(
            "data" => array(
                0 => array(
                    "event_name" => FacebookConversionsAPI::EVENT_SIGNINSIGNUP,
                    "event_id" => 'SigninSignUp.' . Auth::user()->id,
                    "event_time" => $date->getTimestamp(),
                    "action_source" => "website",
                    "event_source_url" => $currentPage,
                    "user_data" => array(
                        "em" => hash("SHA256",(Auth::check() ? Auth::user()->email : null)),
                        "ph" => hash("SHA256",(Auth::check() && Auth::user()->phone) ? Auth::user()->mobile : null),
                        "client_user_agent" => $_SERVER["HTTP_USER_AGENT"],
                        'client_ip_address' => null,
                    ),
                )
            ),
            //'test_event_code' => 'TEST51300', // for development test only
    
        );

        return $this->callAPI($data);
}

    }

    public function pushEvent($eventName, $order = null){

        if(!$eventName){
            return false;
        }

        $result = null;

        $date = new DateTime();
        if(isset($_SERVER['HTTP_REFERER'])) {
            $currentPage = $_SERVER['HTTP_REFERER'];
            }
          else
          {
             $currentPage = "/";
          }
        switch($eventName){
            
            case FacebookConversionsAPI::EVENT_PURCHASE:
                return $this->purchaseEvent($date, $currentPage, $order);
                break;

            case FacebookConversionsAPI::EVENT_ADDTOCART:
                return $this->addToCartEvent($date, $currentPage);
                break;
                
            case FacebookConversionsAPI::EVENT_INITIATECHECKOUT:
                return $this->initiateCheckout($date, $currentPage);
                break;
            
            case FacebookConversionsAPI::EVENT_SIGNINSIGNUP:
                return $this->signInSignUpEvent($date, $currentPage);
                break;
                
                    default:
                return false;
            break;
        }
    }
}