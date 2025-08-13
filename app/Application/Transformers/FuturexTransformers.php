<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class FuturexTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"uid" => $modelOrCollection->uid,
			"cn" => $modelOrCollection->cn,
			"displayName" => $modelOrCollection->displayName,
			"givenName" => $modelOrCollection->givenName,
			"sn" => $modelOrCollection->sn,
			"mail" => $modelOrCollection->mail,
			"Nationalid" => $modelOrCollection->Nationalid,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"uid" => $modelOrCollection->uid,
			"cn" => $modelOrCollection->cn,
			"displayName" => $modelOrCollection->displayName,
			"givenName" => $modelOrCollection->givenName,
			"sn" => $modelOrCollection->sn,
			"mail" => $modelOrCollection->mail,
			"Nationalid" => $modelOrCollection->Nationalid,

        ];
    }

}