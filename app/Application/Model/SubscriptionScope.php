<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SubscriptionScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('subscriptionplatform', 1);
    }
}