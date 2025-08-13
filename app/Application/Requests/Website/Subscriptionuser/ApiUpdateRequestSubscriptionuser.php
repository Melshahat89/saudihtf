<?php
 namespace App\Application\Requests\Website\Subscriptionuser;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSubscriptionuser
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"orders_id" => "required|integer",
         "user_id" => "required|integer",
            "subscription_id" => "start|date",
   "is_collected" => "",
            ];
    }
}
