<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{

  public $table = "newsletter";


   protected $fillable = [
        'email','active'
   ];


}
