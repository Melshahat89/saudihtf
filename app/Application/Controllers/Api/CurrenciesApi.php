<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Currencies;
use App\Application\Transformers\CurrenciesTransformers;
use App\Application\Requests\Website\Currencies\ApiAddRequestCurrencies;
use App\Application\Requests\Website\Currencies\ApiUpdateRequestCurrencies;

class CurrenciesApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Currencies $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestCurrencies $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestCurrencies $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(CurrenciesTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(CurrenciesTransformers::transform($data) + $paginate), $status_code);
    }

}
