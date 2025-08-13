<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class IpcurrencyTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"ip" => $modelOrCollection->ip,
			"type" => $modelOrCollection->type,
			"continent" => $modelOrCollection->continent,
			"continent_code" => $modelOrCollection->continent_code,
			"country" => $modelOrCollection->country,
			"country_code" => $modelOrCollection->country_code,
			"country_flag" => $modelOrCollection->country_flag,
			"region" => $modelOrCollection->region,
			"city" => $modelOrCollection->city,
			"timezone" => $modelOrCollection->timezone,
			"currency" => $modelOrCollection->currency,
			"currency_code" => $modelOrCollection->currency_code,
			"currency_rates" => $modelOrCollection->currency_rates,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"ip" => $modelOrCollection->ip,
			"type" => $modelOrCollection->type,
			"continent" => $modelOrCollection->continent,
			"continent_code" => $modelOrCollection->continent_code,
			"country" => $modelOrCollection->country,
			"country_code" => $modelOrCollection->country_code,
			"country_flag" => $modelOrCollection->country_flag,
			"region" => $modelOrCollection->region,
			"city" => $modelOrCollection->city,
			"timezone" => $modelOrCollection->timezone,
			"currency" => $modelOrCollection->currency,
			"currency_code" => $modelOrCollection->currency_code,
			"currency_rates" => $modelOrCollection->currency_rates,

        ];
    }

}