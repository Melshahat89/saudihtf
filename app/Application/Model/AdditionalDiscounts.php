<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class AdditionalDiscounts extends Model
{
     
   public $table = "additional_discounts";

   protected $fillable = [
        'name', 'status', 'usd_disc', 'egp_disc'
    ];
   
}
