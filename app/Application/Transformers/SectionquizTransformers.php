<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SectionquizTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"title" => $modelOrCollection->title,
			"description" => $modelOrCollection->description,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"title" => $modelOrCollection->title,
			"description" => $modelOrCollection->description,

        ];
    }

}