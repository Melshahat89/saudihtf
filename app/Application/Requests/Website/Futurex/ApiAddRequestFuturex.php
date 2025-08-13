<?php
 namespace App\Application\Requests\Website\Futurex;
  class ApiAddRequestFuturex
{
    public function rules()
    {
        return [
        	"user_id" => "required|integer",
            "uid" => "cn",
   "Nationalid" => "",
            ];
    }
}
