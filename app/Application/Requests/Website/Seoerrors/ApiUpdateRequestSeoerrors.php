<?php

namespace App\Application\Requests\Website\Seoerrors;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestSeoerrors
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "link" => "code",
			"comment" => "",
			
        ];
    }
}
