<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Spin\AddRequestSpin;
use App\Application\Requests\Admin\Spin\UpdateRequestSpin;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SpinsDataTable;
use App\Application\Model\Spin;
use Yajra\Datatables\Request;
use Alert;

class SpinController extends AbstractController
{
    public function __construct(Spin $model)
    {
        parent::__construct($model);
    }

    public function index(SpinsDataTable $dataTable){
        return $dataTable->render('admin.spin.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.spin.edit' , $id);
    }

     public function store(AddRequestSpin $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/spin');
     }

     public function update($id , UpdateRequestSpin $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.spin.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/spin')->with('sucess' , 'Done Delete spin From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/spin')->with('sucess' , 'Done Delete spin From system');
    }

}
