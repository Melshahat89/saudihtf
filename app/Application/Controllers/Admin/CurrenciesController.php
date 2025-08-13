<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Currencies\AddRequestCurrencies;
use App\Application\Requests\Admin\Currencies\UpdateRequestCurrencies;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\CurrenciessDataTable;
use App\Application\Model\Currencies;
use Yajra\Datatables\Request;
use Alert;

class CurrenciesController extends AbstractController
{
    public function __construct(Currencies $model)
    {
        parent::__construct($model);
    }

    public function index(CurrenciessDataTable $dataTable){
        return $dataTable->render('admin.currencies.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.currencies.edit' , $id);
    }

    public function store(AddRequestCurrencies $request){
        $item =  $this->storeOrUpdate($request , null , true);
        return redirect('lazyadmin/currencies');
    }

    public function update($id , UpdateRequestCurrencies $request){
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();

    }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.currencies.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/currencies')->with('sucess' , 'Done Delete currencies From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'lazyadmin/currencies')->with('sucess' , 'Done Delete currencies From system');
    }

}
