<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Consultationsrequests extends Model
{
    public $table = "consultations_requests";
    CONST STATUS_PENDING = 1;
    CONST STATUS_DONE = 2;

    protected $fillable = [
        'consultation_id', 'user_id', 'request', 'scheduled_at', 'status'
    ];

    public function consultation(){
        return $this->belongsTo(Consultations::class, "consultation_id");
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
