<?php
 namespace App\Application\Requests\Website\Consultationsreviews;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestConsultationsreviews extends FormRequest
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
        	// "consultation_id" => "required|integer",
        //  "user_id" => "required|integer",
            "review" => "",
   "rating" => "required",
            ];
    }
}
