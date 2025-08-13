<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

  public $table = "contacts";

   protected $fillable = [
       'name', 'email', 'subject', 'phone', 'message' ,'user_id',
       'title','country_code','company_name','company_size','website_url',
       'source'
   ];


    public function user(){
        return $this->belongsTo('App\Application\Model\User' , 'user_id');
    }



}
