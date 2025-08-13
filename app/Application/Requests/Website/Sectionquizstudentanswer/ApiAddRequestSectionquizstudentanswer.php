<?php
 namespace App\Application\Requests\Website\Sectionquizstudentanswer;
  class ApiAddRequestSectionquizstudentanswer
{
    public function rules()
    {
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
