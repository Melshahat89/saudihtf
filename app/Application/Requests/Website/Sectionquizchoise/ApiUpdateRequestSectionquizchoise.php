<?php
 namespace App\Application\Requests\Website\Sectionquizchoise;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSectionquizchoise
{
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
