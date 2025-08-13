<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Consultationsreviews extends Model
{
    public $table = "consultations_reviews";

    protected $fillable = [
        'review', 'rating', 'user_id', 'consultation_id'
    ];

    public function consultation(){
		return $this->belongsTo(Consultations::class, "consultation_id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
}
