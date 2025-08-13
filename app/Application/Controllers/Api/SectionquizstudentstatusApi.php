<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Sectionquizstudentstatus;
use App\Application\Transformers\SectionquizstudentstatusTransformers;
use App\Application\Requests\Website\Sectionquizstudentstatus\ApiAddRequestSectionquizstudentstatus;
use App\Application\Requests\Website\Sectionquizstudentstatus\ApiUpdateRequestSectionquizstudentstatus;

class SectionquizstudentstatusApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Sectionquizstudentstatus $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSectionquizstudentstatus $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSectionquizstudentstatus $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SectionquizstudentstatusTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SectionquizstudentstatusTransformers::transform($data) + $paginate), $status_code);
    }

}
