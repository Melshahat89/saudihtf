<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use Yajra\Datatables\Request;
use Alert;
use App\Application\DataTables\ConsultationscategoriesDataTable;
use App\Application\Model\Consultationscategories;
use App\Application\Requests\Admin\Consultationscategories\AddRequestConsultationscategories;
use App\Application\Requests\Admin\Consultationscategories\UpdateRequestConsultationscategories;

class ConsultationscategoriesController extends AbstractController
{
    public function __construct(Consultationscategories $model)
    {
        parent::__construct($model);
    }

    public function index(ConsultationscategoriesDataTable $dataTable){
        return $dataTable->render('admin.consultationscategories.index');
    }

    public function show($id = null){

        return $this->createOrEdit('admin.consultationscategories.edit' , $id);
    }

     public function store(AddRequestConsultationscategories $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/consultationscategories');
     }

     public function update($id , UpdateRequestConsultationscategories $request){
            $item = $this->storeOrUpdate($request, $id, true);
            return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.consultationscategories.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/consultationscategories')->with('sucess' , 'Done Delete consultationscategories From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        $explode_id = array_map('intval', explode(',', $request->id[0]));
        foreach ($explode_id as $id){
            $this->deleteItem($id);
        } return $this->deleteItem($request->id , 'lazyadmin/consultationscategories')->with('sucess' , 'Done Delete consultationscategories From system');
    }

}
