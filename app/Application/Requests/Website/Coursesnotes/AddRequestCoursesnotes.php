<?php
 namespace App\Application\Requests\Website\Coursesnotes;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestCoursesnotes extends FormRequest
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
            "lecture_id" => "required|integer",
            "note" => "required",
            "seconds" => "required",
            ];
    }
}
