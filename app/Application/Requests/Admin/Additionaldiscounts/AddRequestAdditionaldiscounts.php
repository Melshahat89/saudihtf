<?php
 namespace App\Application\Requests\Admin\Additionaldiscounts;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestAdditionaldiscounts extends FormRequest
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
        	"name" => "",
            "status" => "",
            "egp_disc" => "",
            "usd_disc" => ""
        ];
    }
}
