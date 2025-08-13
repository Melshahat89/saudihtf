<?php
 namespace App\Application\Requests\Website\Spin;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSpin
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"user_id" => "required|integer",
            "type" => "",
   "code" => "",
            ];
    }
}
