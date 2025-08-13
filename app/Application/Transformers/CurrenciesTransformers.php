<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class CurrenciesTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"currency_code" => $modelOrCollection->currency_code,
			"country_id" => $modelOrCollection->country_id,
			"discount_perc" => $modelOrCollection->discount_perc,
			"exchangeratetoegp" => $modelOrCollection->exchangeratetoegp,
			"exchangeratetousd" => $modelOrCollection->exchangeratetousd,
			"b2c_monthly_discount_perc" => $modelOrCollection->b2c_monthly_discount_perc,
			"b2c_yearly_discount_perc" => $modelOrCollection->b2c_yearly_discount_perc,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"currency_code" => $modelOrCollection->currency_code,
			"country_id" => $modelOrCollection->country_id,
			"discount_perc" => $modelOrCollection->discount_perc,
			"exchangeratetoegp" => $modelOrCollection->exchangeratetoegp,
			"exchangeratetousd" => $modelOrCollection->exchangeratetousd,
			"b2c_monthly_discount_perc" => $modelOrCollection->b2c_monthly_discount_perc,
			"b2c_yearly_discount_perc" => $modelOrCollection->b2c_yearly_discount_perc,

        ];
    }

}