<?php
 namespace App\Application\Requests\Admin\Sectionquiz;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestSectionquiz extends FormRequest
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
        	"courses_id" => "required|integer",
         "coursesections_id" => "required|integer",
            "title" => "",
   "description" => "",
            ];
    }
}
