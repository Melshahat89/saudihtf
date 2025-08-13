<?php
 namespace App\Application\Requests\Website\Sectionquiz;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSectionquiz
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"courses_id" => "required|integer",
         "coursesections_id" => "required|integer",
         "user_id" => "required|integer",
            "title" => "",
   "description" => "",
            ];
    }
}
