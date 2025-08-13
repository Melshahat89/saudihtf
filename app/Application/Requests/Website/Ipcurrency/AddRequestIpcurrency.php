<?php

namespace App\Application\Requests\Website\Ipcurrency;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestIpcurrency extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "ip" => "",
			"type" => "",
			"continent" => "",
			"continent_code" => "",
			"country" => "",
			"country_code" => "",
			"country_flag" => "",
			"region" => "",
			"city" => "",
			"timezone" => "",
			"currency" => "",
			"currency_code" => "",
			"currency_rates" => "",
			
        ];
    }
}
