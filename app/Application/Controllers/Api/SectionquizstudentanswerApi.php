<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Sectionquizstudentanswer;
use App\Application\Transformers\SectionquizstudentanswerTransformers;
use App\Application\Requests\Website\Sectionquizstudentanswer\ApiAddRequestSectionquizstudentanswer;
use App\Application\Requests\Website\Sectionquizstudentanswer\ApiUpdateRequestSectionquizstudentanswer;

class SectionquizstudentanswerApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Sectionquizstudentanswer $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSectionquizstudentanswer $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSectionquizstudentanswer $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SectionquizstudentanswerTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SectionquizstudentanswerTransformers::transform($data) + $paginate), $status_code);
    }

}
