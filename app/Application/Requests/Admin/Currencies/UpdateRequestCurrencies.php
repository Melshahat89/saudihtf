<?php

namespace App\Application\Requests\Admin\Currencies;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateRequestCurrencies extends FormRequest
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
        $id = Route::input('id');
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
