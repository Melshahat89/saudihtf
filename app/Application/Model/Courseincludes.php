<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Courseincludes extends Model
{

     
   public $table = "courseincludes";
   public function courses(){
		return $this->belongsTo(Courses::class, "courses_id");
          }
          public function includedCourse(){
               return $this->belongsTo(Courses::class, "included_course");
               }
     protected $fillable = [
   'courses_id',
   'included_course',
        'position',
        'included_course_title'
   ];


   public function getIncludedCourseTitleLangAttribute()
   {
       return is_json($this->included_course_title) && is_object(json_decode($this->included_course_title)) ? json_decode($this->included_course_title)->{getCurrentLang()} : $this->included_course_title;
   }
   public function getIncludedCourseTitleEnAttribute()
   {
       return is_json($this->included_course_title) && is_object(json_decode($this->included_course_title)) ? json_decode($this->included_course_title)->en : $this->included_course_title;
   }
   public function getIncludedCourseTitleArAttribute()
   {
       return is_json($this->included_course_title) && is_object(json_decode($this->included_course_title)) ? json_decode($this->included_course_title)->ar : $this->included_course_title;
   }
   
  }
