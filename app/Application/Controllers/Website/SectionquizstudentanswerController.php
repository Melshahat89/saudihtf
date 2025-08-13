<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Sectionquizstudentanswer;
use App\Application\Requests\Website\Sectionquizstudentanswer\AddRequestSectionquizstudentanswer;
use App\Application\Requests\Website\Sectionquizstudentanswer\UpdateRequestSectionquizstudentanswer;

class SectionquizstudentanswerController extends AbstractController
{

     public function __construct(Sectionquizstudentanswer $model)
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

			if(request()->has("is_correct") && request()->get("is_correct") != ""){
				$items = $items->where("is_correct","=", request()->get("is_correct"));
			}

			if(request()->has("answered") && request()->get("answered") != ""){
				$items = $items->where("answered","=", request()->get("answered"));
			}

			if(request()->has("mark") && request()->get("mark") != ""){
				$items = $items->where("mark","=", request()->get("mark"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.sectionquizstudentanswer.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.sectionquizstudentanswer.edit' , $id);
     }

     public function store(AddRequestSectionquizstudentanswer $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('sectionquizstudentanswer');
     }

     public function update($id , UpdateRequestSectionquizstudentanswer $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.sectionquizstudentanswer.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'sectionquizstudentanswer')->with('sucess' , 'Done Delete Sectionquizstudentanswer From system');
     }


}
