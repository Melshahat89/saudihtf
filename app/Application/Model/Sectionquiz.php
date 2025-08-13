<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Sectionquiz extends Model
{

   public $table = "sectionquiz";
   public function sectionquizstudentanswer(){
		return $this->hasMany(Sectionquizstudentanswer::class, "sectionquiz_id");
		}
   public function sectionquizstudentstatus(){
  return $this->hasMany(Sectionquizstudentstatus::class, "sectionquiz_id");
  }
   public function sectionquizquestions(){
  return $this->hasMany(Sectionquizquestions::class, "sectionquiz_id");
  }
   public function courses(){
  return $this->belongsTo(Courses::class, "courses_id");
  }
   public function coursesections(){
  return $this->belongsTo(Coursesections::class, "coursesections_id");
  }
     protected $fillable = [
     'courses_id',
     'coursesections_id',
        'title','description'
   ];


     public function getQuizSumAttribute(){
         return $this->sectionquizquestions->sum('mark');
     }

     public function getquizQuestionsCountAttribute(){
         return $this->sectionquizquestions->COUNT();
     }



     public static function currentStudentMark($quizInstatntId){
         $result = Sectionquizstudentanswer::where('sectionquizstudentstatus_id',$quizInstatntId)->groupBy('sectionquizchoise_id')->get();
         $total = 0;
         foreach ($result as $row) {
             $total += $row->mark;
         }
         return $total;
     }



  }
