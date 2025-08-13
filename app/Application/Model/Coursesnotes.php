<?php

namespace App\Application\Model;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;

class Coursesnotes extends Model
{

  public $table = "coursesnotes";

   protected $fillable = [
       'note', 'user_id', 'lecture_id', 'courses_id', 'seconds'
   ];


    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    
    public function courses(){
        return $this->belongsTo(Courses::class , 'courses_id');
    }

    public function lecture(){
        return $this->belongsTo(Courselectures::class , 'lecture_id');
    }

    public function getTimeAttribute(){
        return gmdate("H:i:s", $this->seconds);
    }
}
