<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Sectionquizquestions;
use App\Application\Transformers\SectionquizquestionsTransformers;
use App\Application\Requests\Website\Sectionquizquestions\ApiAddRequestSectionquizquestions;
use App\Application\Requests\Website\Sectionquizquestions\ApiUpdateRequestSectionquizquestions;

class SectionquizquestionsApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Sectionquizquestions $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSectionquizquestions $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSectionquizquestions $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SectionquizquestionsTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SectionquizquestionsTransformers::transform($data) + $paginate), $status_code);
    }

}
