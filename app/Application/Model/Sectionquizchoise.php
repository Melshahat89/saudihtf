<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Sectionquizchoise extends Model
{

   public $table = "sectionquizchoise";
   public function sectionquizstudentanswer(){
		return $this->hasMany(Sectionquizstudentanswer::class, "sectionquizchoise_id");
		}
   public function sectionquizquestions(){
  return $this->belongsTo(Sectionquizquestions::class, "sectionquizquestions_id");
  }
     protected $fillable = [
   'sectionquizquestions_id',
        'choise','is_correct'
   ];
  }
