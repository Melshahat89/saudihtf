<?php

namespace App\Application\Requests\Website\Currencies;


class ApiAddRequestCurrencies
{
    public function rules()
    {
        return [
            "currency_code" => "country|id",
			"b2c_yearly_discount_perc" => "",
			
        ];
    }
}
