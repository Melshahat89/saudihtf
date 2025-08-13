<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Spin extends Model
{
   public $table = "spin";
   public function user(){
		return $this->belongsTo(User::class, "user_id");
		}
     protected $fillable = [
   'user_id',
        'type','code'
   ];
  }
