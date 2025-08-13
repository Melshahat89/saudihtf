<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Sectionquiz\AddRequestSectionquiz;
use App\Application\Requests\Admin\Sectionquiz\UpdateRequestSectionquiz;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SectionquizsDataTable;
use App\Application\Model\Sectionquiz;
use Yajra\Datatables\Request;
use Alert;

class SectionquizController extends AbstractController
{
    public function __construct(Sectionquiz $model)
    {
        parent::__construct($model);
    }

    public function index(SectionquizsDataTable $dataTable){
        return $dataTable->render('admin.sectionquiz.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.sectionquiz.edit' , $id);
    }

     public function store(AddRequestSectionquiz $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/sectionquiz');
     }

     public function update($id , UpdateRequestSectionquiz $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.sectionquiz.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/sectionquiz')->with('sucess' , 'Done Delete sectionquiz From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'lazyadmin/sectionquiz')->with('sucess' , 'Done Delete sectionquiz From system');
    }

}
