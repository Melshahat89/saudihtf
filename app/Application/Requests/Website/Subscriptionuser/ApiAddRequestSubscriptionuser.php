<?php
 namespace App\Application\Requests\Website\Subscriptionuser;
  class ApiAddRequestSubscriptionuser
{
    public function rules()
    {
        return [
        	"orders_id" => "required|integer",
         "user_id" => "required|integer",
            "subscription_id" => "start|date",
   "is_collected" => "",
            ];
    }
}
