<?php

namespace App\Application\Requests\Website\Ipcurrency;


class ApiAddRequestIpcurrency
{
    public function rules()
    {
        return [
            "ip" => "type",
			"currency_rates" => "",
			
        ];
    }
}
