<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Sectionquizchoise\AddRequestSectionquizchoise;
use App\Application\Requests\Admin\Sectionquizchoise\UpdateRequestSectionquizchoise;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SectionquizchoisesDataTable;
use App\Application\Model\Sectionquizchoise;
use Yajra\Datatables\Request;
use Alert;

class SectionquizchoiseController extends AbstractController
{
    public function __construct(Sectionquizchoise $model)
    {
        parent::__construct($model);
    }

    public function index(SectionquizchoisesDataTable $dataTable){
        return $dataTable->render('admin.sectionquizchoise.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.sectionquizchoise.edit' , $id);
    }

     public function store(AddRequestSectionquizchoise $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/sectionquizchoise');
     }

     public function update($id , UpdateRequestSectionquizchoise $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.sectionquizchoise.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/sectionquizchoise')->with('sucess' , 'Done Delete sectionquizchoise From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'lazyadmin/sectionquizchoise')->with('sucess' , 'Done Delete sectionquizchoise From system');
    }

}
