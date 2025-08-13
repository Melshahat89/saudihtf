<?php
 namespace App\Application\Requests\Website\Spin;
  class ApiAddRequestSpin
{
    public function rules()
    {
        return [
        	"user_id" => "required|integer",
            "type" => "",
   "code" => "",
            ];
    }
}
