<?php
 namespace App\Application\Requests\Website\Sectionquizstudentstatus;
  class ApiAddRequestSectionquizstudentstatus
{
    public function rules()
    {
        return [
        	"sectionquiz_id" => "required|integer",
         "user_id" => "required|integer",
            "passed" => "status",
   "end_time" => "",
            ];
    }
}
