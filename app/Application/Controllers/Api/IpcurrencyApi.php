<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Ipcurrency;
use App\Application\Transformers\IpcurrencyTransformers;
use App\Application\Requests\Website\Ipcurrency\ApiAddRequestIpcurrency;
use App\Application\Requests\Website\Ipcurrency\ApiUpdateRequestIpcurrency;

class IpcurrencyApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Ipcurrency $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestIpcurrency $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestIpcurrency $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(IpcurrencyTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(IpcurrencyTransformers::transform($data) + $paginate), $status_code);
    }

}
