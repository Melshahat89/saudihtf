<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use Yajra\Datatables\Request;
use Alert;
use App\Application\DataTables\BlogpostsDataTable;
use App\Application\Model\Blogposts;
use App\Application\Requests\Admin\Blogposts\AddRequestBlogposts;
use App\Application\Requests\Admin\Blogposts\UpdateRequestBlogposts;

class BlogpostsController extends AbstractController
{
    public function __construct(Blogposts $model)
    {
        parent::__construct($model);
    }

    public function index(BlogpostsDataTable $dataTable){
        return $dataTable->render('admin.blogposts.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.blogposts.edit' , $id);
    }

     public function store(AddRequestBlogposts $request){

        if(!$request->has('slug')){
            $slug = str_replace(' ', '-', $request->all()['title']['ar']);
            $request->request->add(['slug' => $slug]); //add request
          }

          $item =  $this->storeOrUpdate($request , null , true);

          return redirect('lazyadmin/blogposts');
     }

     public function update($id , UpdateRequestBlogposts $request){

        if(!$request->has('slug')){
            $slug = str_replace(' ', '-', $request->all()['title']['ar']);
            $request->request->add(['slug' => $slug]); //add request
          }

          if(!$request->has('seo_keys')){
            $request->request->add(['seo_keys' => '']); //add request

          }

         if ($request->has("oldFiles_images") && $request->oldFiles_images != "") {
             $oldImage_images = $request->oldFiles_images;
             $request->request->remove("oldFiles_images");
         } else {
             $oldImage_images = json_encode([]);
         }

          $item = $this->storeOrUpdate($request, $id, true);

         if ($item) {
             $image = json_decode($item->images) ?? [];
             $newIamge = json_decode($oldImage_images) ?? [];
             $item_image = array_unique(array_merge($image, $newIamge));
             $item->images = json_encode($item_image);
             $item->save();
         }
          
          
        return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.blogposts.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'lazyadmin/blogposts')->with('sucess' , 'Done Delete Blog Post From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
$explode_id = array_map('intval', explode(',', $request->id[0]));
        foreach ($explode_id as $id){
            $this->deleteItem($id);
        } return $this->deleteItem($request->id , 'lazyadmin/blogposts')->with('sucess' , 'Done Delete Blog Post From system');
    }

}
