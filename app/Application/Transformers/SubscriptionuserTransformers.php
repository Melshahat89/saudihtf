<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SubscriptionuserTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"subscription_id" => $modelOrCollection->subscription_id,
			"start_date" => $modelOrCollection->start_date,
			"end_date" => $modelOrCollection->end_date,
			"amount" => $modelOrCollection->amount,
			"b_type" => $modelOrCollection->b_type,
			"is_active" => $modelOrCollection->is_active,
			"is_collected" => $modelOrCollection->is_collected,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"subscription_id" => $modelOrCollection->subscription_id,
			"start_date" => $modelOrCollection->start_date,
			"end_date" => $modelOrCollection->end_date,
			"amount" => $modelOrCollection->amount,
			"b_type" => $modelOrCollection->b_type,
			"is_active" => $modelOrCollection->is_active,
			"is_collected" => $modelOrCollection->is_collected,

        ];
    }

}