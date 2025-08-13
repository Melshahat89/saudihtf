<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Sectionquizstudentstatus\AddRequestSectionquizstudentstatus;
use App\Application\Requests\Admin\Sectionquizstudentstatus\UpdateRequestSectionquizstudentstatus;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SectionquizstudentstatussDataTable;
use App\Application\Model\Sectionquizstudentstatus;
use Yajra\Datatables\Request;
use Alert;

class SectionquizstudentstatusController extends AbstractController
{
    public function __construct(Sectionquizstudentstatus $model)
    {
        parent::__construct($model);
    }

    public function index(SectionquizstudentstatussDataTable $dataTable){
        return $dataTable->render('admin.sectionquizstudentstatus.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.sectionquizstudentstatus.edit' , $id);
    }

     public function store(AddRequestSectionquizstudentstatus $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/sectionquizstudentstatus');
     }

     public function update($id , UpdateRequestSectionquizstudentstatus $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.sectionquizstudentstatus.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/sectionquizstudentstatus')->with('sucess' , 'Done Delete sectionquizstudentstatus From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'lazyadmin/sectionquizstudentstatus')->with('sucess' , 'Done Delete sectionquizstudentstatus From system');
    }

}
