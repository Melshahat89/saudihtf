<?php
 namespace App\Application\Requests\Website\Sectionquizstudentanswer;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSectionquizstudentanswer
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"sectionquizquestions_id" => "required|integer",
         "user_id" => "required|integer",
         "sectionquizchoise_id" => "required|integer",
         "sectionquiz_id" => "required|integer",
         "sectionquizstudentstatus_id" => "required|integer",
            "is_correct" => "answered",
   "mark" => "",
            ];
    }
}
