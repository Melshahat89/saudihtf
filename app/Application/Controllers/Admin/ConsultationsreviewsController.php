<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use Yajra\Datatables\Request;
use Alert;
use App\Application\DataTables\ConsultationsreviewsDataTable;
use App\Application\Model\Consultationsreviews;
use App\Application\Requests\Admin\Consultationsreviews\AddRequestConsultationsreviews;
use App\Application\Requests\Admin\Consultationsreviews\UpdateRequestConsultationsreviews;

class ConsultationsreviewsController extends AbstractController
{
    public function __construct(Consultationsreviews $model)
    {
        parent::__construct($model);
    }

    public function index(ConsultationsreviewsDataTable $dataTable){
        return $dataTable->render('admin.consultationsreviews.index');
    }

    public function show($id = null){

        return $this->createOrEdit('admin.consultationsreviews.edit' , $id);
    }

     public function store(AddRequestConsultationsreviews $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/consultationsreviews');
     }

     public function update($id , UpdateRequestConsultationsreviews $request){
            $item = $this->storeOrUpdate($request, $id, true);
            return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.consultationsreviews.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/consultationsreviews')->with('sucess' , 'Done Delete consultationsreviews From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        $explode_id = array_map('intval', explode(',', $request->id[0]));
        foreach ($explode_id as $id){
            $this->deleteItem($id);
        } return $this->deleteItem($request->id , 'lazyadmin/consultationsreviews')->with('sucess' , 'Done Delete consultationsreviews From system');
    }

}
