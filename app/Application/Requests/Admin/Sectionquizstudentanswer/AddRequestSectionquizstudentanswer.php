<?php
 namespace App\Application\Requests\Admin\Sectionquizstudentanswer;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestSectionquizstudentanswer extends FormRequest
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
        	"sectionquizquestions_id" => "required|integer",
         "user_id" => "required|integer",
         "sectionquizchoise_id" => "required|integer",
         "sectionquiz_id" => "required|integer",
//         "sectionquizstudentstatus_id" => "required|integer",
            "is_correct" => "",
   "answered" => "",
   "mark" => "",
            ];
    }
}
