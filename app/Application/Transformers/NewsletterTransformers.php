<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class NewsletterTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"email" => $modelOrCollection->email,
			"active" => $modelOrCollection->active,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"email" => $modelOrCollection->email,
			"active" => $modelOrCollection->active,

        ];
    }

}