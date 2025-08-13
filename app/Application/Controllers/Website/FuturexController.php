<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Futurex;
use App\Application\Requests\Website\Futurex\AddRequestFuturex;
use App\Application\Requests\Website\Futurex\UpdateRequestFuturex;

class FuturexController extends AbstractController
{

     public function __construct(Futurex $model)
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

			if(request()->has("uid") && request()->get("uid") != ""){
				$items = $items->where("uid","=", request()->get("uid"));
			}

			if(request()->has("cn") && request()->get("cn") != ""){
				$items = $items->where("cn","=", request()->get("cn"));
			}

			if(request()->has("displayName") && request()->get("displayName") != ""){
				$items = $items->where("displayName","=", request()->get("displayName"));
			}

			if(request()->has("givenName") && request()->get("givenName") != ""){
				$items = $items->where("givenName","=", request()->get("givenName"));
			}

			if(request()->has("sn") && request()->get("sn") != ""){
				$items = $items->where("sn","=", request()->get("sn"));
			}

			if(request()->has("mail") && request()->get("mail") != ""){
				$items = $items->where("mail","=", request()->get("mail"));
			}

			if(request()->has("Nationalid") && request()->get("Nationalid") != ""){
				$items = $items->where("Nationalid","=", request()->get("Nationalid"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.futurex.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.futurex.edit' , $id);
     }

     public function store(AddRequestFuturex $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('futurex');
     }

     public function update($id , UpdateRequestFuturex $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.futurex.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'futurex')->with('sucess' , 'Done Delete Futurex From system');
     }


}
