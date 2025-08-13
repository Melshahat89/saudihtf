<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Coursesnotes;
use App\Application\Model\Coursewishlist;
use App\Application\Requests\Website\Coursesnotes\AddRequestCoursesnotes;
use App\Application\Requests\Website\Coursesnotes\UpdateRequestCoursesnotes;
use App\Application\Requests\Website\Coursewishlist\AddRequestCoursewishlist;
use App\Application\Requests\Website\Coursewishlist\UpdateRequestCoursewishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesnotesController extends AbstractController
{

     public function __construct(Coursesnotes $model)
     {
        parent::__construct($model);
     }

     public function index(){

     }

     public function show($id){

        $note = Coursesnotes::findOrFail($id);
        $output = "<form action='/coursesnotes/item/" . $id . "' method='POST' enctype='multipart/form-data' class='login-form col-md-12'>";
        $output .= csrf_field();
        $output .= "<div class='input-group'>";
        $output .= "<textarea name='note' id='note' class='form-control' placeholder='' aria-label='Your answer' value='" . $note->note . "'>" . $note->note . "</textarea>";
        $output .= "</div>";

        $output .= "<div class='text-right p-20'>";
        $output .= "<button type='submit' class='add-to-cart'>" . trans('courses.Save') . "</button>";
        $output .= "</div>";

        $output .= "</form>"; 

        return $output;
     }

     public function store(AddRequestCoursesnotes $request){        
          $request->request->add(['user_id'=> Auth::user()->id]) ;
          $item =  $this->storeOrUpdate($request , null , true);
          alert()->success(trans('admin.Done'));
          return back()->withInput(['seconds' => $request->get('seconds')]);
     }

     public function update($id , Request $request){
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();
     }

     public function getById($id){

     }

     public function destroy($id){
         $this->deleteItem($id , 'coursesnotes')->with('sucess' , 'Done');
         return back();
     }


}
