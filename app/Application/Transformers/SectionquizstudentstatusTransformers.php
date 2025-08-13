<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SectionquizstudentstatusTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"passed" => $modelOrCollection->passed,
			"status" => $modelOrCollection->status,
			"start_time" => $modelOrCollection->start_time,
			"end_time" => $modelOrCollection->end_time,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"passed" => $modelOrCollection->passed,
			"status" => $modelOrCollection->status,
			"start_time" => $modelOrCollection->start_time,
			"end_time" => $modelOrCollection->end_time,

        ];
    }

}