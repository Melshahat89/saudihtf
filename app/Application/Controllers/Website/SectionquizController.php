<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Sectionquiz;
use App\Application\Requests\Website\Sectionquiz\AddRequestSectionquiz;
use App\Application\Requests\Website\Sectionquiz\UpdateRequestSectionquiz;

class SectionquizController extends AbstractController
{

     public function __construct(Sectionquiz $model)
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

			if(request()->has("title") && request()->get("title") != ""){
				$items = $items->where("title","=", request()->get("title"));
			}

			if(request()->has("description") && request()->get("description") != ""){
				$items = $items->where("description","=", request()->get("description"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.sectionquiz.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.sectionquiz.edit' , $id);
     }

     public function store(AddRequestSectionquiz $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('sectionquiz');
     }

     public function update($id , UpdateRequestSectionquiz $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.sectionquiz.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'sectionquiz')->with('sucess' , 'Done Delete Sectionquiz From system');
     }


}
