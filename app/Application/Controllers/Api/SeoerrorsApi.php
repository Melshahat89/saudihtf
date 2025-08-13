<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Seoerrors;
use App\Application\Transformers\SeoerrorsTransformers;
use App\Application\Requests\Website\Seoerrors\ApiAddRequestSeoerrors;
use App\Application\Requests\Website\Seoerrors\ApiUpdateRequestSeoerrors;

class SeoerrorsApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Seoerrors $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSeoerrors $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSeoerrors $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SeoerrorsTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SeoerrorsTransformers::transform($data) + $paginate), $status_code);
    }

}
