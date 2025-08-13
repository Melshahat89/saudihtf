<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use Yajra\Datatables\Request;
use Alert;
use App\Application\DataTables\BlogcategoriesDataTable;
use App\Application\Model\Blogcategories;
use App\Application\Requests\Admin\Blogcategories\AddRequestBlogcategories;
use App\Application\Requests\Admin\Blogcategories\UpdateRequestBlogcategories;

class BlogcategoriesController extends AbstractController
{
    public function __construct(Blogcategories $model)
    {
        parent::__construct($model);
    }

    public function index(BlogcategoriesDataTable $dataTable){
        return $dataTable->render('admin.blogcategories.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.blogcategories.edit' , $id);
    }

     public function store(AddRequestBlogcategories $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('lazyadmin/blogcategories');
     }

     public function update($id , UpdateRequestBlogcategories $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.blogcategories.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/blogcategories')->with('sucess' , 'Done Delete Blog Category From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
$explode_id = array_map('intval', explode(',', $request->id[0]));
        foreach ($explode_id as $id){
            $this->deleteItem($id);
        } return $this->deleteItem($request->id , 'lazyadmin/blogcategories')->with('sucess' , 'Done Delete Blog Category From system');
    }

}
