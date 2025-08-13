<?php
 namespace App\Application\Requests\Admin\Sectionquizstudentstatus;
 use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
 class UpdateRequestSectionquizstudentstatus extends FormRequest
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
        	"sectionquiz_id" => "required|integer",
         "user_id" => "required|integer",
            "passed" => "",
   "status" => "",
   "start_time" => "",
   "end_time" => "",
            ];
    }
}
