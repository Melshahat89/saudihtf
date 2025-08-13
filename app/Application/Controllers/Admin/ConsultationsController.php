<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use Yajra\Datatables\Request;
use Alert;
use App\Application\DataTables\ConsultationsDataTable;
use App\Application\Model\Consultations;
use App\Application\Requests\Admin\Consultations\AddRequestConsultations;
use App\Application\Requests\Admin\Consultations\UpdateRequestConsultations;

class ConsultationsController extends AbstractController
{
    public function __construct(Consultations $model)
    {
        parent::__construct($model);
    }

    public function index(ConsultationsDataTable $dataTable){
        return $dataTable->render('admin.consultations.index');
    }

    public function show($id = null){

        return $this->createOrEdit('admin.consultations.edit' , $id);
    }

     public function store(AddRequestConsultations $request){
            $item =  $this->storeOrUpdate($request , null , true);
            return redirect('lazyadmin/consultations');
     }

     public function update($id , UpdateRequestConsultations $request){
            $item = $this->storeOrUpdate($request, $id, true);
            return redirect()->back();
     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.consultations.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/consultations')->with('sucess' , 'Done Delete consultations From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        $explode_id = array_map('intval', explode(',', $request->id[0]));
        foreach ($explode_id as $id){
            $this->deleteItem($id);
        } return $this->deleteItem($request->id , 'lazyadmin/consultations')->with('sucess' , 'Done Delete consultations From system');
    }

}
