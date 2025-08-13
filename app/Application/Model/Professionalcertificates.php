<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;

 class Professionalcertificates extends Model
{
   public $table = "professionalcertificates";
   public function courses(){
		return $this->belongsTo(Courses::class, "courses_id");
		}
     protected $fillable = [
   'courses_id',
        'startdate','appointment','days','hours','seats','registrationdeadline'
   ];
  }
