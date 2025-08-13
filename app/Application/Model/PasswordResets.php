<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
  public $table = "password_resets";


   protected $fillable = [
        'email',
        'token',
   ];


}
