<?php
 namespace App\Application\Requests\Admin\Subscriptionuser;
 use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
 class UpdateRequestSubscriptionuser extends FormRequest
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
        $id = Route::input('id');
        return [
//        	"orders_id" => "required|integer",
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
