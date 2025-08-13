<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Sectionquizquestions;
use App\Application\Requests\Website\Sectionquizquestions\AddRequestSectionquizquestions;
use App\Application\Requests\Website\Sectionquizquestions\UpdateRequestSectionquizquestions;

class SectionquizquestionsController extends AbstractController
{

     public function __construct(Sectionquizquestions $model)
     {
        parent::__construct($model);
     }

     public function index(){
        $items = $this->model;

        if(request()->has('from') && request()->get('from') != ''){
            $items = $items->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $items = $items->whereDate('created_at' , '<=' , request()->get('to'));
        }

			if(request()->has("question") && request()->get("question") != ""){
				$items = $items->where("question","=", request()->get("question"));
			}

			if(request()->has("mark") && request()->get("mark") != ""){
				$items = $items->where("mark","=", request()->get("mark"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.sectionquizquestions.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.sectionquizquestions.edit' , $id);
     }

     public function store(AddRequestSectionquizquestions $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('sectionquizquestions');
     }

     public function update($id , UpdateRequestSectionquizquestions $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.sectionquizquestions.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'sectionquizquestions')->with('sucess' , 'Done Delete Sectionquizquestions From system');
     }


}
