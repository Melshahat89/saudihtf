<?php

namespace App\Application\Requests\Website\Currencies;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestCurrencies
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "currency_code" => "country|id",
			"b2c_yearly_discount_perc" => "",
			
        ];
    }
}
