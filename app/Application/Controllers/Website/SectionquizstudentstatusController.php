<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Sectionquizstudentstatus;
use App\Application\Requests\Website\Sectionquizstudentstatus\AddRequestSectionquizstudentstatus;
use App\Application\Requests\Website\Sectionquizstudentstatus\UpdateRequestSectionquizstudentstatus;

class SectionquizstudentstatusController extends AbstractController
{

     public function __construct(Sectionquizstudentstatus $model)
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

			if(request()->has("passed") && request()->get("passed") != ""){
				$items = $items->where("passed","=", request()->get("passed"));
			}

			if(request()->has("status") && request()->get("status") != ""){
				$items = $items->where("status","=", request()->get("status"));
			}

			if(request()->has("start_time") && request()->get("start_time") != ""){
				$items = $items->where("start_time","=", request()->get("start_time"));
			}

			if(request()->has("end_time") && request()->get("end_time") != ""){
				$items = $items->where("end_time","=", request()->get("end_time"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.sectionquizstudentstatus.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.sectionquizstudentstatus.edit' , $id);
     }

     public function store(AddRequestSectionquizstudentstatus $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('sectionquizstudentstatus');
     }

     public function update($id , UpdateRequestSectionquizstudentstatus $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.sectionquizstudentstatus.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'sectionquizstudentstatus')->with('sucess' , 'Done Delete Sectionquizstudentstatus From system');
     }


}
