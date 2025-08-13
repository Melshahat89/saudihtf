<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Futurex extends Model
{
   public $table = "futurex";
   public function user(){
		return $this->belongsTo(User::class, "user_id");
		}
     protected $fillable = [
   'user_id',
        'uid',

         'cn','displayName','givenName','sn','mail','Nationalid', //Deleted

         'eppn','email','arabicFullName','englishFullName','arabicFirstName','arabicLastName','englishFirstName','englishLastName'



   ];
  }
