<?php

namespace App\Application\Requests\Website\Newsletter;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestNewsletter
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "email" => "email",
			"active" => "",
			
        ];
    }
}
