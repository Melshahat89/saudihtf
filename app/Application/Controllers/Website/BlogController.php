<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Blogcategories;
use App\Application\Model\Blogposts;
use App\Application\Model\Homesettings;
use Illuminate\Support\Facades\Route;

class BlogController extends AbstractController
{

     public function __construct()
     {
        
     }

     public function blog($param=null){

         if($param){
            if(Route::currentRouteName() == "tag"){
                // $param = str_replace("+", " ", $param);
                session()->pull('category_slug');
                // session()->put('tag_slug', str_replace(' ', '-', $param));
                session()->put('tag_slug', str_replace('+', ' ', $param));

            }elseif(Route::currentRouteName() == "category"){
                session()->pull('tag_slug');
                session()->put('category_slug', $param);
            }
         }else{
            session()->pull('tag_slug');
            session()->pull('category_slug');
         }

         $this->data['homesettings'] = Homesettings::where('id', 1)->first();

         $this->data['mostViewed'] = $mostViewed = Blogposts::where('visits', '>', 0)->limit(8)->orderBy('visits', 'DESC')->get();

         return view('website.blog.index', $this->data);

     }

     public function category($slug){
       

     }

     public function post($category, $post){

         $cat = Blogcategories::where(function ($q) use ($category) {
            $q->where('slug', $category)
            ->orWhere('slug', urlencode($category));
         })->firstOrFail();

         $this->data['item'] = Blogposts::where(function ($q) use ($post) {
            $q->where('slug', $post)
            ->orWhere('slug', urlencode($post));
         })->firstOrFail();

         $this->data['item']->visits += 1;
         $this->data['item']->save();

         $this->data['homesettings'] = Homesettings::where('id', 1)->first();

         return view('website.blog.post', $this->data);
     }
     
     public function show($id = null){
         return $this->createOrEdit('website.careers.edit' , $id);
     }

}
