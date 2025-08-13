<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Sectionquizquestions\AddRequestSectionquizquestions;
use App\Application\Requests\Admin\Sectionquizquestions\UpdateRequestSectionquizquestions;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SectionquizquestionssDataTable;
use App\Application\Model\Sectionquizquestions;
use Yajra\Datatables\Request;
use Alert;

class SectionquizquestionsController extends AbstractController
{
    public function __construct(Sectionquizquestions $model)
    {
        parent::__construct($model);
    }

    public function index(SectionquizquestionssDataTable $dataTable){
        return $dataTable->render('admin.sectionquizquestions.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.sectionquizquestions.edit' , $id);
    }

     public function store(AddRequestSectionquizquestions $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/sectionquizquestions');
     }

     public function update($id , UpdateRequestSectionquizquestions $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.sectionquizquestions.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/sectionquizquestions')->with('sucess' , 'Done Delete sectionquizquestions From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'lazyadmin/sectionquizquestions')->with('sucess' , 'Done Delete sectionquizquestions From system');
    }

}
