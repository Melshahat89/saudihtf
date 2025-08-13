<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SeoerrorsTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"link" => $modelOrCollection->link,
			"code" => $modelOrCollection->code,
			"comment" => $modelOrCollection->comment,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"link" => $modelOrCollection->link,
			"code" => $modelOrCollection->code,
			"comment" => $modelOrCollection->comment,

        ];
    }

}