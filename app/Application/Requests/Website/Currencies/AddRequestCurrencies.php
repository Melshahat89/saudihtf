<?php

namespace App\Application\Requests\Website\Currencies;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestCurrencies extends FormRequest
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
            "currency_code" => "",
			"country_id" => "",
			"discount_perc" => "",
			"exchangeratetoegp" => "",
			"exchangeratetousd" => "",
			"b2c_monthly_discount_perc" => "",
			"b2c_yearly_discount_perc" => "",
			
        ];
    }
}
