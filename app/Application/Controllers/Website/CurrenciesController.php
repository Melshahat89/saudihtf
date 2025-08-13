<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Currencies;
use App\Application\Requests\Website\Currencies\AddRequestCurrencies;
use App\Application\Requests\Website\Currencies\UpdateRequestCurrencies;

class CurrenciesController extends AbstractController
{

     public function __construct(Currencies $model)
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

			if(request()->has("currency_code") && request()->get("currency_code") != ""){
				$items = $items->where("currency_code","=", request()->get("currency_code"));
			}

			if(request()->has("country_id") && request()->get("country_id") != ""){
				$items = $items->where("country_id","=", request()->get("country_id"));
			}

			if(request()->has("discount_perc") && request()->get("discount_perc") != ""){
				$items = $items->where("discount_perc","=", request()->get("discount_perc"));
			}

			if(request()->has("exchangeratetoegp") && request()->get("exchangeratetoegp") != ""){
				$items = $items->where("exchangeratetoegp","=", request()->get("exchangeratetoegp"));
			}

			if(request()->has("exchangeratetousd") && request()->get("exchangeratetousd") != ""){
				$items = $items->where("exchangeratetousd","=", request()->get("exchangeratetousd"));
			}

			if(request()->has("b2c_monthly_discount_perc") && request()->get("b2c_monthly_discount_perc") != ""){
				$items = $items->where("b2c_monthly_discount_perc","=", request()->get("b2c_monthly_discount_perc"));
			}

			if(request()->has("b2c_yearly_discount_perc") && request()->get("b2c_yearly_discount_perc") != ""){
				$items = $items->where("b2c_yearly_discount_perc","=", request()->get("b2c_yearly_discount_perc"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.currencies.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.currencies.edit' , $id);
     }

     public function store(AddRequestCurrencies $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('currencies');
     }

     public function update($id , UpdateRequestCurrencies $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.currencies.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'currencies')->with('sucess' , 'Done Delete Currencies From system');
     }


}
