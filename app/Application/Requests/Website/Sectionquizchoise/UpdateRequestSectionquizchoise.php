<?php
 namespace App\Application\Requests\Website\Sectionquizchoise;
 use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
 class UpdateRequestSectionquizchoise extends FormRequest
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
        	"sectionquizquestions_id" => "required|integer",
            "choise" => "",
   "is_correct" => "",
            ];
    }
}
