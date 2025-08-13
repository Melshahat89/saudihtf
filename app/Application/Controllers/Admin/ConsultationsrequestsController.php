<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use Yajra\Datatables\Request;
use Alert;
use App\Application\DataTables\ConsultationsrequestsDataTable;
use App\Application\Model\Consultationsrequests;
use App\Application\Requests\Admin\Consultationsrequests\AddRequestConsultationsrequests;
use App\Application\Requests\Admin\Consultationsrequests\UpdateRequestConsultationsrequests;

class ConsultationsrequestsController extends AbstractController
{
    public function __construct(Consultationsrequests $model)
    {
        parent::__construct($model);
    }

    public function index(ConsultationsrequestsDataTable $dataTable){
        return $dataTable->render('admin.consultationsrequests.index');
    }

    public function show($id = null){

        return $this->createOrEdit('admin.consultationsrequests.edit' , $id);
    }

     public function store(AddRequestConsultationsrequests $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/consultationsrequests');
     }

     public function update($id , UpdateRequestConsultationsrequests $request){
            $item = $this->storeOrUpdate($request, $id, true);
            return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.consultationsrequests.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/consultationsrequests')->with('sucess' , 'Done Delete consultationsrequests From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        $explode_id = array_map('intval', explode(',', $request->id[0]));
        foreach ($explode_id as $id){
            $this->deleteItem($id);
        } return $this->deleteItem($request->id , 'lazyadmin/consultationsrequests')->with('sucess' , 'Done Delete consultationsrequests From system');
    }

}
