<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Blogpostscategories extends Model
{
   public $table = "blog_posts_categories";

   public function category(){
        return $this->belongsTo(Blogcategories::class, "blog_cat_id");
   }

   public function post(){
      return $this->belongsTo(Blogposts::class, 'blog_post_id');
   }
}
