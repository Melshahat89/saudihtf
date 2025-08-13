<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Sectionquiz;
use App\Application\Transformers\SectionquizTransformers;
use App\Application\Requests\Website\Sectionquiz\ApiAddRequestSectionquiz;
use App\Application\Requests\Website\Sectionquiz\ApiUpdateRequestSectionquiz;

class SectionquizApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Sectionquiz $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSectionquiz $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSectionquiz $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SectionquizTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SectionquizTransformers::transform($data) + $paginate), $status_code);
    }

}
