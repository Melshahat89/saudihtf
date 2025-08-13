<?php
 namespace App\Application\Requests\Website\Coursesnotes;
 use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

 class UpdateRequestCoursesnotes extends FormRequest
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
        	"courses_id" => "required|integer",
            "lecture_id" => "required|integer",
            "note" => "required",
            "seconds" => "required",

            ];
    }
}
