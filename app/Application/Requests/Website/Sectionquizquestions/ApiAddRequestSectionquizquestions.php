<?php
 namespace App\Application\Requests\Website\Sectionquizquestions;
  class ApiAddRequestSectionquizquestions
{
    public function rules()
    {
        return [
        	"sectionquiz_id" => "required|integer",
            "question" => "",
   "mark" => "",
            ];
    }
}
