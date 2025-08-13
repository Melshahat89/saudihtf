<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Newsletter;
use App\Application\Requests\Website\Newsletter\AddRequestNewsletter;
use App\Application\Requests\Website\Newsletter\UpdateRequestNewsletter;

class NewsletterController extends AbstractController
{

    public function __construct(Newsletter $model)
    {
        parent::__construct($model);
    }

    public function index(){
        $items = $this->model;

        if(request()->has('from') && request()->get('from') != ''){
            $items = $items->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $items = $items->whereDate('created_at' , '<=' , request()->get('to'));
        }

        if(request()->has("email") && request()->get("email") != ""){
            $items = $items->where("email","=", request()->get("email"));
        }

        if(request()->has("active") && request()->get("active") != ""){
            $items = $items->where("active","=", request()->get("active"));
        }



        $items = $items->paginate(env('PAGINATE'));
        return view('website.newsletter.index' , compact('items'));
    }

    public function show($id = null){
        return $this->createOrEdit('website.newsletter.edit' , $id);
    }

    public function store(AddRequestNewsletter $request){
        $item =  $this->storeOrUpdate($request , null , true);
        alert()->success("لقد تم تسجيلكم فى قائمة النشرة الاخبارية ليصلكم كل جديد ... ! ", "شكراً");
        return redirect()->back();
    }

    public function update($id , UpdateRequestNewsletter $request){
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();

    }

    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('website.newsletter.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'newsletter')->with('sucess' , 'Done Delete Newsletter From system');
    }


}
