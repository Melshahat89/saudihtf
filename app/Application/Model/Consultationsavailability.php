<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Consultationsavailability extends Model
{
    public $table = "consultations_availability";

    protected $fillable = [
        'start_date', 'end_date', 'consultation_id'
    ];
}
