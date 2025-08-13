<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Ipcurrency\AddRequestIpcurrency;
use App\Application\Requests\Admin\Ipcurrency\UpdateRequestIpcurrency;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\IpcurrencysDataTable;
use App\Application\Model\Ipcurrency;
use Yajra\Datatables\Request;
use Alert;

class IpcurrencyController extends AbstractController
{
    public function __construct(Ipcurrency $model)
    {
        parent::__construct($model);
    }

    public function index(IpcurrencysDataTable $dataTable){
        return $dataTable->render('admin.ipcurrency.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.ipcurrency.edit' , $id);
    }

     public function store(AddRequestIpcurrency $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/ipcurrency');
     }

     public function update($id , UpdateRequestIpcurrency $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.ipcurrency.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/ipcurrency')->with('sucess' , 'Done Delete ipcurrency From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/ipcurrency')->with('sucess' , 'Done Delete ipcurrency From system');
    }

}
