<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Ipcurrency;
use App\Application\Requests\Website\Ipcurrency\AddRequestIpcurrency;
use App\Application\Requests\Website\Ipcurrency\UpdateRequestIpcurrency;

class IpcurrencyController extends AbstractController
{

     public function __construct(Ipcurrency $model)
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

			if(request()->has("ip") && request()->get("ip") != ""){
				$items = $items->where("ip","=", request()->get("ip"));
			}

			if(request()->has("type") && request()->get("type") != ""){
				$items = $items->where("type","=", request()->get("type"));
			}

			if(request()->has("continent") && request()->get("continent") != ""){
				$items = $items->where("continent","=", request()->get("continent"));
			}

			if(request()->has("continent_code") && request()->get("continent_code") != ""){
				$items = $items->where("continent_code","=", request()->get("continent_code"));
			}

			if(request()->has("country") && request()->get("country") != ""){
				$items = $items->where("country","=", request()->get("country"));
			}

			if(request()->has("country_code") && request()->get("country_code") != ""){
				$items = $items->where("country_code","=", request()->get("country_code"));
			}

			if(request()->has("country_flag") && request()->get("country_flag") != ""){
				$items = $items->where("country_flag","=", request()->get("country_flag"));
			}

			if(request()->has("region") && request()->get("region") != ""){
				$items = $items->where("region","=", request()->get("region"));
			}

			if(request()->has("city") && request()->get("city") != ""){
				$items = $items->where("city","=", request()->get("city"));
			}

			if(request()->has("timezone") && request()->get("timezone") != ""){
				$items = $items->where("timezone","=", request()->get("timezone"));
			}

			if(request()->has("currency") && request()->get("currency") != ""){
				$items = $items->where("currency","=", request()->get("currency"));
			}

			if(request()->has("currency_code") && request()->get("currency_code") != ""){
				$items = $items->where("currency_code","=", request()->get("currency_code"));
			}

			if(request()->has("currency_rates") && request()->get("currency_rates") != ""){
				$items = $items->where("currency_rates","=", request()->get("currency_rates"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.ipcurrency.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.ipcurrency.edit' , $id);
     }

     public function store(AddRequestIpcurrency $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('ipcurrency');
     }

     public function update($id , UpdateRequestIpcurrency $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.ipcurrency.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'ipcurrency')->with('sucess' , 'Done Delete Ipcurrency From system');
     }


}
