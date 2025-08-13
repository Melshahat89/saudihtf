<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Subscriptionuser\AddRequestSubscriptionuser;
use App\Application\Requests\Admin\Subscriptionuser\UpdateRequestSubscriptionuser;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SubscriptionusersDataTable;
use App\Application\Model\Subscriptionuser;
use Yajra\Datatables\Request;
use Alert;

class SubscriptionuserController extends AbstractController
{
    public function __construct(Subscriptionuser $model)
    {
        parent::__construct($model);
    }

    public function index(SubscriptionusersDataTable $dataTable){
        return $dataTable->render('admin.subscriptionuser.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.subscriptionuser.edit' , $id);
    }

    public function store(AddRequestSubscriptionuser $request){
        $item =  $this->storeOrUpdate($request , null , true);
        return redirect('lazyadmin/subscriptionuser');
    }

    public function update($id , UpdateRequestSubscriptionuser $request){
        $item = $this->storeOrUpdate($request, $id, true);


        return redirect()->back();

    }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.subscriptionuser.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/subscriptionuser')->with('sucess' , 'Done Delete subscriptionuser From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'lazyadmin/subscriptionuser')->with('sucess' , 'Done Delete subscriptionuser From system');
    }

}
