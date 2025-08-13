<?php
 namespace App\Application\Requests\Website\Subscriptionuser;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestSubscriptionuser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        	"orders_id" => "required|integer",
         "user_id" => "required|integer",
            "subscription_id" => "",
   "start_date" => "",
   "end_date" => "",
   "amount" => "",
   "b_type" => "",
   "is_active" => "",
   "is_collected" => "",
            ];
    }
}
