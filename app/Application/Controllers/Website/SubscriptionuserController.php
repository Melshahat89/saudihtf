<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Subscriptionuser;
use App\Application\Requests\Website\Subscriptionuser\AddRequestSubscriptionuser;
use App\Application\Requests\Website\Subscriptionuser\UpdateRequestSubscriptionuser;

class SubscriptionuserController extends AbstractController
{

     public function __construct(Subscriptionuser $model)
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

			if(request()->has("subscription_id") && request()->get("subscription_id") != ""){
				$items = $items->where("subscription_id","=", request()->get("subscription_id"));
			}

			if(request()->has("start_date") && request()->get("start_date") != ""){
				$items = $items->where("start_date","=", request()->get("start_date"));
			}

			if(request()->has("end_date") && request()->get("end_date") != ""){
				$items = $items->where("end_date","=", request()->get("end_date"));
			}

			if(request()->has("amount") && request()->get("amount") != ""){
				$items = $items->where("amount","=", request()->get("amount"));
			}

			if(request()->has("b_type") && request()->get("b_type") != ""){
				$items = $items->where("b_type","=", request()->get("b_type"));
			}

			if(request()->has("is_active") && request()->get("is_active") != ""){
				$items = $items->where("is_active","=", request()->get("is_active"));
			}

			if(request()->has("is_collected") && request()->get("is_collected") != ""){
				$items = $items->where("is_collected","=", request()->get("is_collected"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.subscriptionuser.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.subscriptionuser.edit' , $id);
     }

     public function store(AddRequestSubscriptionuser $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('subscriptionuser');
     }

     public function update($id , UpdateRequestSubscriptionuser $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.subscriptionuser.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'subscriptionuser')->with('sucess' , 'Done Delete Subscriptionuser From system');
     }


}
