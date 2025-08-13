<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Sectionquizchoise;
use App\Application\Requests\Website\Sectionquizchoise\AddRequestSectionquizchoise;
use App\Application\Requests\Website\Sectionquizchoise\UpdateRequestSectionquizchoise;

class SectionquizchoiseController extends AbstractController
{

     public function __construct(Sectionquizchoise $model)
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

			if(request()->has("choise") && request()->get("choise") != ""){
				$items = $items->where("choise","=", request()->get("choise"));
			}

			if(request()->has("is_correct") && request()->get("is_correct") != ""){
				$items = $items->where("is_correct","=", request()->get("is_correct"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.sectionquizchoise.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.sectionquizchoise.edit' , $id);
     }

     public function store(AddRequestSectionquizchoise $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('sectionquizchoise');
     }

     public function update($id , UpdateRequestSectionquizchoise $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.sectionquizchoise.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'sectionquizchoise')->with('sucess' , 'Done Delete Sectionquizchoise From system');
     }


}
