<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use Yajra\Datatables\Request;
use Alert;
use App\Application\DataTables\AdditionaldiscountsDataTable;
use App\Application\Model\AdditionalDiscounts;
use App\Application\Requests\Admin\Additionaldiscounts\AddRequestAdditionaldiscounts;
use App\Application\Requests\Admin\Additionaldiscounts\UpdateRequestAdditionaldiscounts;

class AdditionaldiscountsController extends AbstractController
{
    public function __construct(AdditionalDiscounts $model)
    {
        parent::__construct($model);
    }

    public function index(AdditionaldiscountsDataTable $dataTable){
        return $dataTable->render('admin.additionaldiscounts.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.additionaldiscounts.edit' , $id);
    }

     public function store(AddRequestAdditionaldiscounts $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/additionaldiscounts');
     }

     public function update($id , UpdateRequestAdditionaldiscounts $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.additionaldiscounts.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/additionaldiscounts')->with('sucess' , 'Done Delete additionaldiscounts From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
$explode_id = array_map('intval', explode(',', $request->id[0]));
        foreach ($explode_id as $id){
            $this->deleteItem($id);
        } return $this->deleteItem($request->id , 'lazyadmin/additionaldiscounts')->with('sucess' , 'Done Delete additionaldiscounts From system');
    }

}
