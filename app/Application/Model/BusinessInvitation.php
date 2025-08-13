<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class BusinessInvitation extends Model
{

  public $table = "businessinvitations";


   protected $fillable = [
     'businessdata_id', 'token', 'invitationslimit', 'group_id', 'name'
   ];

   public function businessdata(){
     return $this->belongsTo(Businessdata::class, 'businessdata_id');
   }

   public static function countInvitationUsers($token){
     return count(User::where('business_invitation', $token)->get());
   }


}
