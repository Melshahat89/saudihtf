<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Newsletter\AddRequestNewsletter;
use App\Application\Requests\Admin\Newsletter\UpdateRequestNewsletter;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\NewslettersDataTable;
use App\Application\Model\Newsletter;
use Yajra\Datatables\Request;
use Alert;

class NewsletterController extends AbstractController
{
    public function __construct(Newsletter $model)
    {
        parent::__construct($model);
    }

    public function index(NewslettersDataTable $dataTable){
        return $dataTable->render('admin.newsletter.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.newsletter.edit' , $id);
    }

     public function store(AddRequestNewsletter $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/newsletter');
     }

     public function update($id , UpdateRequestNewsletter $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.newsletter.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/newsletter')->with('sucess' , 'Done Delete newsletter From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/newsletter')->with('sucess' , 'Done Delete newsletter From system');
    }

}
