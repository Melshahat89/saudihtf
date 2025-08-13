<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SectionquizquestionsTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"question" => $modelOrCollection->question,
			"mark" => $modelOrCollection->mark,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"question" => $modelOrCollection->question,
			"mark" => $modelOrCollection->mark,

        ];
    }

}