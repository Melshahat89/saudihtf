<?php
 namespace App\Application\Requests\Website\Sectionquizquestions;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSectionquizquestions
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"sectionquiz_id" => "required|integer",
            "question" => "",
   "mark" => "",
            ];
    }
}
