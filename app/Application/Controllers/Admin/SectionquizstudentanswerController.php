<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Sectionquizstudentanswer\AddRequestSectionquizstudentanswer;
use App\Application\Requests\Admin\Sectionquizstudentanswer\UpdateRequestSectionquizstudentanswer;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SectionquizstudentanswersDataTable;
use App\Application\Model\Sectionquizstudentanswer;
use Yajra\Datatables\Request;
use Alert;

class SectionquizstudentanswerController extends AbstractController
{
    public function __construct(Sectionquizstudentanswer $model)
    {
        parent::__construct($model);
    }

    public function index(SectionquizstudentanswersDataTable $dataTable){
        return $dataTable->render('admin.sectionquizstudentanswer.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.sectionquizstudentanswer.edit' , $id);
    }

     public function store(AddRequestSectionquizstudentanswer $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/sectionquizstudentanswer');
     }

     public function update($id , UpdateRequestSectionquizstudentanswer $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.sectionquizstudentanswer.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/sectionquizstudentanswer')->with('sucess' , 'Done Delete sectionquizstudentanswer From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'lazyadmin/sectionquizstudentanswer')->with('sucess' , 'Done Delete sectionquizstudentanswer From system');
    }

}
