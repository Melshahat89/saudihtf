<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Futurex;
use App\Application\Transformers\FuturexTransformers;
use App\Application\Requests\Website\Futurex\ApiAddRequestFuturex;
use App\Application\Requests\Website\Futurex\ApiUpdateRequestFuturex;

class FuturexApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Futurex $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestFuturex $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestFuturex $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(FuturexTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(FuturexTransformers::transform($data) + $paginate), $status_code);
    }

}
