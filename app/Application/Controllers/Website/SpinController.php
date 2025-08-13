<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Spin;
use App\Application\Requests\Website\Spin\AddRequestSpin;
use App\Application\Requests\Website\Spin\UpdateRequestSpin;

class SpinController extends AbstractController
{

     public function __construct(Spin $model)
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

			if(request()->has("type") && request()->get("type") != ""){
				$items = $items->where("type","=", request()->get("type"));
			}

			if(request()->has("code") && request()->get("code") != ""){
				$items = $items->where("code","=", request()->get("code"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.spin.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.spin.edit' , $id);
     }

     public function store(AddRequestSpin $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('spin');
     }

     public function update($id , UpdateRequestSpin $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.spin.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'spin')->with('sucess' , 'Done Delete Spin From system');
     }


}
