<?php
 namespace App\Application\Requests\Website\Futurex;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestFuturex
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"user_id" => "required|integer",
            "uid" => "cn",
   "Nationalid" => "",
            ];
    }
}
