<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Usertargets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsertargetsController extends AbstractController
{

     public function __construct(Usertargets $model)
     {
        parent::__construct($model);
     }

     public function index(){

     }

     public function show($id = null){
        //  return $this->createOrEdit('website.coursesections.edit' , $id);
     }

     public function store(Request $request){
        
        $item = $this->model->where('user_id', Auth::user()->id)->where('type', $request->get('type'))->first();
        $request->request->add(['user_id' => Auth::user()->id]);
        if($item){
            $item =  $this->storeOrUpdate($request , $item->id , true);
        }else{
            $item =  $this->storeOrUpdate($request , null , true);
        }

        alert()->success(trans('account.Target Saved Successfully'), trans('website.Success'));

          return back();
     }

     public function update($id , Request $request){
        //   $item = $this->storeOrUpdate($request, $id, true);
        //     return redirect()->back();

     }

     public function getById($id){
        //  $fields = $this->model->findOrFail($id);
        //  return $this->createOrEdit('website.coursesections.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id=null){
        $this->deleteItem($id, null)->with(trans('account.Target Remove Successfully'), trans('website.Success'));
         return back();
     }


}
