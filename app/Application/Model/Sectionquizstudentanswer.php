<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Sectionquizstudentanswer extends Model
{
   public $table = "sectionquizstudentanswer";
   public function sectionquizquestions(){
		return $this->belongsTo(Sectionquizquestions::class, "sectionquizquestions_id");
		}
   public function user(){
  return $this->belongsTo(User::class, "user_id");
  }
   public function sectionquizchoise(){
  return $this->belongsTo(Sectionquizchoise::class, "sectionquizchoise_id");
  }
   public function sectionquiz(){
  return $this->belongsTo(Sectionquiz::class, "sectionquiz_id");
  }
   public function sectionquizstudentstatus(){
  return $this->belongsTo(Sectionquizstudentstatus::class, "sectionquizstudentstatus_id");
  }
     protected $fillable = [
     'sectionquizquestions_id',
     'user_id',
     'sectionquizchoise_id',
     'sectionquiz_id',
   'sectionquizstudentstatus_id',
        'is_correct','answered','mark'
   ];
  }
