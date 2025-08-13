<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SpinTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"type" => $modelOrCollection->type,
			"code" => $modelOrCollection->code,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"type" => $modelOrCollection->type,
			"code" => $modelOrCollection->code,

        ];
    }

}