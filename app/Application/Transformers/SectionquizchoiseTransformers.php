<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SectionquizchoiseTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"choise" => $modelOrCollection->choise,
			"is_correct" => $modelOrCollection->is_correct,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"choise" => $modelOrCollection->choise,
			"is_correct" => $modelOrCollection->is_correct,

        ];
    }

}