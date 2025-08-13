<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Seoerrors extends Model
{

  public $table = "seoerrors";


   protected $fillable = [
        'link','code','comment'
   ];


}
