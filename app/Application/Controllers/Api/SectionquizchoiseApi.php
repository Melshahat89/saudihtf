<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Sectionquizchoise;
use App\Application\Transformers\SectionquizchoiseTransformers;
use App\Application\Requests\Website\Sectionquizchoise\ApiAddRequestSectionquizchoise;
use App\Application\Requests\Website\Sectionquizchoise\ApiUpdateRequestSectionquizchoise;

class SectionquizchoiseApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Sectionquizchoise $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSectionquizchoise $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSectionquizchoise $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SectionquizchoiseTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SectionquizchoiseTransformers::transform($data) + $paginate), $status_code);
    }

}
