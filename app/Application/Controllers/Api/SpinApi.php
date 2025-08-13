<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Spin;
use App\Application\Transformers\SpinTransformers;
use App\Application\Requests\Website\Spin\ApiAddRequestSpin;
use App\Application\Requests\Website\Spin\ApiUpdateRequestSpin;

class SpinApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Spin $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSpin $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSpin $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SpinTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SpinTransformers::transform($data) + $paginate), $status_code);
    }

}
