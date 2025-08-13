<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Sectionquizquestions extends Model
{
     
   public $table = "sectionquizquestions";

   public function sectionquizstudentanswer(){
		return $this->hasMany(Sectionquizstudentanswer::class, "sectionquizquestions_id");
		}
   public function sectionquizchoise(){
  return $this->hasMany(Sectionquizchoise::class, "sectionquizquestions_id");
  }
   public function sectionquiz(){
  return $this->belongsTo(Sectionquiz::class, "sectionquiz_id");
  }
     protected $fillable = [
   'sectionquiz_id',
        'question','mark'
   ];
  }
