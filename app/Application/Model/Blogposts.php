<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class Blogposts extends Model
{
   public $table = "blog_posts";

   protected $fillable = [
      'title',
      'description',
      'slug', 'cat_id', 'status', 'image', 'seo_keys', 'seo_desc', 'visits','images','videosurl','alt_image','canonical'
   ];

   public function categories()
   {
    //    return $this->belongsTo(Blogcategories::class, "cat_id");
       return $this->hasMany(Blogpostscategories::class, "blog_post_id");
   }

   public function blogpostcategories()
   {
       return $this->belongsToMany(Blogcategories::class, 'blog_posts_categories','blog_post_id', 'blog_cat_id');
   }

   public function getTitleLangAttribute()
   {
       return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->{getCurrentLang()} : $this->title;
   }
   public function getTitleEnAttribute()
   {
       return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->en : $this->title;
   }
   public function getTitleArAttribute()
   {
       return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->ar : $this->title;
   }
   public function getDescriptionLangAttribute()
   {
       return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->{getCurrentLang()} : $this->description;
   }
   public function getDescriptionEnAttribute()
   {
       return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->en : $this->description;
   }
   public function getDescriptionArAttribute()
   {
       return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->ar : $this->description;
   }

   public function getSeodescLangAttribute()
    {
        return is_json($this->seo_desc) && is_object(json_decode($this->seo_desc)) ? json_decode($this->seo_desc)->{getCurrentLang()} : $this->seo_desc;
    }
    public function getSeodescEnAttribute()
    {
        return is_json($this->seo_desc) && is_object(json_decode($this->seo_desc)) ? json_decode($this->seo_desc)->en : $this->seo_desc;
    }
    public function getSeodescArAttribute()
    {
        return is_json($this->seo_desc) && is_object(json_decode($this->seo_desc)) ? json_decode($this->seo_desc)->ar : $this->seo_desc;
    }
}
