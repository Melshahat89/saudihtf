<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Usertargets extends Model
{
    public $table = "usertargets";

    const TYPE_WEEKLY = 2;

    protected $fillable = [
        'user_id', 'type', 'target'
    ];

}
