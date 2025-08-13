<?php
 namespace App\Application\Requests\Website\Consultationsreviews;
  class ApiAddRequestConsultationsreviews
{
    public function rules()
    {
        return [
        	// "consultation_id" => "required|integer",
        //  "user_id" => "required|integer",
            "review" => "",
   "rating" => "required",
            ];
    }
}
