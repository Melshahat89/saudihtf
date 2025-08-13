<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Yajra\Datatables\Request;
use Alert;
use App\Application\DataTables\ConsultationsreviewsDataTable;
use App\Application\Model\Consultationsreviews;
use App\Application\Requests\Website\Consultationsreviews\AddRequestConsultationsreviews;
use App\Application\Requests\Website\Consultationsreviews\UpdateRequestConsultationsreviews;
use Illuminate\Support\Facades\Auth;

class ConsultationsreviewsController extends AbstractController
{
    public function __construct(Consultationsreviews $model)
    {
        parent::__construct($model);
    }

    public function index(ConsultationsreviewsDataTable $dataTable){
        // return $dataTable->render('admin.consultationsreviews.index');
    }

    public function show($id = null){

        // return $this->createOrEdit('admin.consultationsreviews.edit' , $id);
    }

     public function store(AddRequestConsultationsreviews $request){
        dd($request->all());
        $request->request->add(['user_id' =>  Auth::user()->id]); //add user_id
        $item =  $this->storeOrUpdate($request , null , true);
        alert()->success(trans('website.Your review has been added successfully') , trans('website.Success'));
        return redirect()->back();
    }

     public function update($id , UpdateRequestConsultationsreviews $request){
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();
     }

    public function getById($id){

    }

    public function destroy($id){
        return $this->deleteItem($id , 'consultationsreviews')->with('sucess' , 'Done Delete review From system');
    }

}
