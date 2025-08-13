<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Newsletter;
use App\Application\Transformers\NewsletterTransformers;
use App\Application\Requests\Website\Newsletter\ApiAddRequestNewsletter;
use App\Application\Requests\Website\Newsletter\ApiUpdateRequestNewsletter;

class NewsletterApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Newsletter $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestNewsletter $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestNewsletter $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(NewsletterTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(NewsletterTransformers::transform($data) + $paginate), $status_code);
    }

}
