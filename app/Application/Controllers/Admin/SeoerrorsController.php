<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Seoerrors\AddRequestSeoerrors;
use App\Application\Requests\Admin\Seoerrors\UpdateRequestSeoerrors;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SeoerrorssDataTable;
use App\Application\Model\Seoerrors;
use Yajra\Datatables\Request;
use Alert;

class SeoerrorsController extends AbstractController
{
    public function __construct(Seoerrors $model)
    {
        parent::__construct($model);
    }

    public function index(SeoerrorssDataTable $dataTable){
        return $dataTable->render('admin.seoerrors.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.seoerrors.edit' , $id);
    }

     public function store(AddRequestSeoerrors $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/seoerrors');
     }

     public function update($id , UpdateRequestSeoerrors $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.seoerrors.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/seoerrors')->with('sucess' , 'Done Delete seoerrors From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'lazyadmin/seoerrors')->with('sucess' , 'Done Delete seoerrors From system');
    }

}
