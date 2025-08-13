<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    public $table = "logs";


    const TYPE_ADMIN = 1;
    const TYPE_USER = 2;

    protected $fillable = [
        'action' , 'model'  , 'status' , 'user_id' , 'messages', "type", "model_id", "courses_id"
    ];

    public function user(){
        return $this->belongsTo('App\Application\Model\User' , 'user_id');
    }

    public function courses(){
        return $this->belongsTo(Courses::class, 'courses_id');
    }

    public function getActionType(){
        if($this->type == Log::TYPE_USER){
            if($this->model == "courseenrollments"){
                return trans('website.enrolled');
            }elseif($this->model == "lecturequestions"){
                return trans('website.added question');
            }elseif($this->model == "assessmentanswers"){
                return trans('website.submitted assessment');
            }elseif($this->model == "courselectures"){
                return trans('website.viewed lecture');
            }
        }

        return false;
    }
}
