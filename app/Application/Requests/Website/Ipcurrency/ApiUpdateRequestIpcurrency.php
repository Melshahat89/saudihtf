<?php

namespace App\Application\Requests\Website\Ipcurrency;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestIpcurrency
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "ip" => "type",
			"currency_rates" => "",
			
        ];
    }
}
