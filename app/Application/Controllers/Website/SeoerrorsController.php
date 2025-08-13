<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Seoerrors;
use App\Application\Requests\Website\Seoerrors\AddRequestSeoerrors;
use App\Application\Requests\Website\Seoerrors\UpdateRequestSeoerrors;

class SeoerrorsController extends AbstractController
{

     public function __construct(Seoerrors $model)
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

			if(request()->has("link") && request()->get("link") != ""){
				$items = $items->where("link","=", request()->get("link"));
			}

			if(request()->has("code") && request()->get("code") != ""){
				$items = $items->where("code","=", request()->get("code"));
			}

			if(request()->has("comment") && request()->get("comment") != ""){
				$items = $items->where("comment","=", request()->get("comment"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.seoerrors.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.seoerrors.edit' , $id);
     }

     public function store(AddRequestSeoerrors $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('seoerrors');
     }

     public function update($id , UpdateRequestSeoerrors $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($key){
         $fields = $this->model->where('link',$key)->first();

         if($fields){
             return \Illuminate\Http\Response::create("error ".$fields->code, $fields->code);
         }else{
             abort(404);
         }



     }

     public function destroy($id){
         return $this->deleteItem($id , 'seoerrors')->with('sucess' , 'Done Delete Seoerrors From system');
     }


}
