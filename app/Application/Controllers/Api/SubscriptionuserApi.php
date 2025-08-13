<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Subscriptionuser;
use App\Application\Transformers\SubscriptionuserTransformers;
use App\Application\Requests\Website\Subscriptionuser\ApiAddRequestSubscriptionuser;
use App\Application\Requests\Website\Subscriptionuser\ApiUpdateRequestSubscriptionuser;

class SubscriptionuserApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Subscriptionuser $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSubscriptionuser $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSubscriptionuser $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SubscriptionuserTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SubscriptionuserTransformers::transform($data) + $paginate), $status_code);
    }

}
