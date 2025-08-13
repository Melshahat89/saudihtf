<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Futurex\AddRequestFuturex;
use App\Application\Requests\Admin\Futurex\UpdateRequestFuturex;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\FuturexsDataTable;
use App\Application\Model\Futurex;
use Yajra\Datatables\Request;
use Alert;

class FuturexController extends AbstractController
{
    public function __construct(Futurex $model)
    {
        parent::__construct($model);
    }

    public function index(FuturexsDataTable $dataTable){
        return $dataTable->render('admin.futurex.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.futurex.edit' , $id);
    }

     public function store(AddRequestFuturex $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/futurex');
     }

     public function update($id , UpdateRequestFuturex $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.futurex.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/futurex')->with('sucess' , 'Done Delete futurex From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/futurex')->with('sucess' , 'Done Delete futurex From system');
    }

}
