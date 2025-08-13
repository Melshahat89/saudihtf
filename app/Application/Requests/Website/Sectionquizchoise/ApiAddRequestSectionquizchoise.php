<?php
 namespace App\Application\Requests\Website\Sectionquizchoise;
  class ApiAddRequestSectionquizchoise
{
    public function rules()
    {
        return [
        	"sectionquizquestions_id" => "required|integer",
            "choise" => "",
   "is_correct" => "",
            ];
    }
}
