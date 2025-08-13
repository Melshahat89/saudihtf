<?php
 namespace App\Application\Requests\Website\Sectionquiz;
  class ApiAddRequestSectionquiz
{
    public function rules()
    {
        return [
        	"courses_id" => "required|integer",
         "coursesections_id" => "required|integer",
         "user_id" => "required|integer",
            "title" => "",
   "description" => "",
            ];
    }
}
