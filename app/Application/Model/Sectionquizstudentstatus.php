<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Sectionquizstudentstatus extends Model
{

   public $table = "sectionquizstudentstatus";
   public function sectionquizstudentanswer(){
		return $this->hasMany(Sectionquizstudentanswer::class, "sectionquizstudentstatus_id");
		}
   public function sectionquiz(){
  return $this->belongsTo(Sectionquiz::class, "sectionquiz_id");
  }
   public function user(){
  return $this->belongsTo(User::class, "user_id");
  }
     protected $fillable = [
     'sectionquiz_id',
   'user_id',
        'passed','status','start_time','end_time'
   ];



     public function getStudentAnswerdQuestionsCountAttribute()
     {
         return $this->sectionquizstudentanswer->where('answered', 1)->groupBy('sectionquizchoise_id')->count();
     }


     public function getStudentAnswerdCorrectQuestionsCountAttribute()
     {
         return $this->sectionquizstudentanswer->where('is_correct', 1)->groupBy('sectionquizchoise_id')->count();
     }

     public function getCurrentStudentPercentageAttribute()
     {
         $studentScore = Sectionquiz::currentStudentMark($this->id);
         $percentage = round( (( $studentScore * 100 ) /$this->sectionquiz->quizSum),1 );
         return $percentage;
     }


  }
