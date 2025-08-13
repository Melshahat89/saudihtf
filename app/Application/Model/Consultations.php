<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Consultations extends Model
{
    public $table = "consultations";
    protected $fillable = [
        'title', 'slug', 'description', 'price', 'price_usd', 'discount_egp', 'discount_usd', 'image', 'cons_categories_id', 'consultant_id',
        'consultant_perc', 'published', 'visits'
    ];

    public function consultationcategories()
    {
        return $this->belongsTo(Consultationscategories::class, "cons_categories_id");
    }

    public function consultant(){
        return $this->belongsTo(User::class, 'consultant_id');
    }

    public function consultationsavailability(){
        return $this->hasMany(Consultationsavailability::class, 'consultation_id');

    }

    public function getTitleLangAttribute()
    {
        return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->{getCurrentLang()} : $this->title;
    }
    public function getTitleEnAttribute()
    {
        return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->en : $this->title;
    }
    public function getTitleArAttribute()
    {
        return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->ar : $this->title;
    }
    public function getDescriptionLangAttribute()
    {
        return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->{getCurrentLang()} : $this->description;
    }
    public function getDescriptionEnAttribute()
    {
        return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->en : $this->description;
    }
    public function getDescriptionArAttribute()
    {
        return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->ar : $this->description;
    }

    public function getPriceBaseAttribute()
    {
        $currency = getCurrency();
        if ($currency == "EGP") {
            $price = $this->price;
            $discount = $this->discount_egp;
        }else{
            $price = $this->price_usd;
            $discount = $this->discount_usd;
        }

        $priceAfterInternalDescount = $price - (($price * $discount) / 100);
        $promoPrice = $priceAfterInternalDescount;

        return (['discount' => $discount, 'price' => round($price), 'currency' => $currency, 'promoPrice' => round($promoPrice)]);
    }

    public function getPriceTextAttribute()
    {
        $BasePrice = $this->getPriceBaseAttribute();
        $discount = $BasePrice['discount'];
        $price = $BasePrice['price'];
        $currency = $BasePrice['currency'];
        $promoPrice = $BasePrice['promoPrice'];
        ////////////////////////////////////////////
        if ($discount == 0) {
            if ($promoPrice == 0) {
                return "<div class='d-inline-block m-2'><span>" .  trans('courses.Free') . "</span></div>";
            } else {
                return "<div class='d-inline-block m-2'><span class=''>" . $currency . "
                " . number_format($price) . "</span></div>";
            }
        }
        if ($promoPrice == 0) {
            $priceText = "<del class='course_old_price d-block m-2'>" . $currency . "
        " . number_format($price) . "</del>" . "<div class='d-inline-block m-2'>"  . "
         " . trans('courses.Free')  . "</div>";
        } else {
            $priceText = "<del class='course_old_price d-block m-2'>" . $currency . " " . number_format($price) . "</del>" . "<div class='d-inline-block m-2'>" . $currency . "
            " . number_format($promoPrice) . "</div>";
        }
        return $priceText;
    }

    public function getOriginalPriceAttribute()
    {
        $BasePrice = $this->getPriceBaseAttribute();
        $promoPrice = $BasePrice['promoPrice'];
        ////////////////////////////////////////////
        return $promoPrice;
    }

    public function consultationreviews()
    {
        return $this->hasMany(Consultationsreviews::class, "consultation_id");
    }

    public function getConsultationSumRatingAttribute()
    {
        return $this->consultationreviews->sum('rating');
    }

    public function getConsultationCountRatingAttribute()
    {
        return $this->consultationreviews->count();
    }

    public function getConsultationRatingAttribute()
    {
        return $this->consultationreviews->count() ? $this->consultationreviews->sum('rating') / $this->consultationreviews->count() : 0;
    }

    public function getRatingAttribute()
    {
        $fullRating = ($this->ConsultationCountRating) ? $this->ConsultationSumRating / $this->ConsultationCountRating : 0;
        $rate = ($fullRating > 0) ? round($fullRating, 1) : '<br>';
        if ($fullRating) {
            for ($i = 1; $i <= round($fullRating, 1); $i++) {
                $rate .= " <i class='star-rating checked'></i> ";
            }
            $notChecked = 5 - (int) $fullRating;
            for ($i = 1; $i <= $notChecked; $i++) {
                $rate .= " <i class='star-rating'></i> ";
            }
            $rate .= " (" . round($this->ConsultationCountRating, 1) . ")</span>";
        }
        return $rate;
    }

    public function getConsultationRatingDetailsAttribute()
    {
        $ratingDetails = DB::table('consultations_reviews')
            ->select('rating', DB::raw('COUNT(rating) as ratingCount'))
            ->groupBy('rating')
            ->get();
        $count = 0;
        foreach ($ratingDetails as $item) {
            $count = $count + $item->ratingCount;
        }
        return array("ratingDetails" => $ratingDetails, "count" => $count);
    }

    public static function isEnrolled($id, $userId = null)
    {
         if (!$userId AND !isset(Auth::user()->id)) {
            return false;
        }

        $userId = ($userId) ? $userId : Auth::user()->id;

         if (!$userId) {
            return false;
        }

        $enrollment = Consultationsrequests::where('user_id', $userId)->where('consultation_id', $id)->where('status', Consultationsrequests::STATUS_DONE)->first();
        
        return ($enrollment) ? true : false;
    }

    public function getConsultationCountStudentsAttribute()
    {
        return Consultationsrequests::where('consultation_id', $this->id)->where('status', Consultationsrequests::STATUS_DONE)->count();
    }

    public function getConsultationRevenueAttribute(){
        return Transactions::where('consultation_id', $this->id)->where('user_id', Auth::user()->id)->sum('amount');
    }

    public function getConsultationCountStudentsFromTo($from, $to){
        return Consultationsrequests::where('consultation_id', $this->id)->whereBetween('updated_at', [$from, $to])->where('status', Consultationsrequests::STATUS_DONE)->count();
    }

    public function getConsultationRevenueAttributeFromTo($from, $to){
        return Transactions::where('consultation_id', $this->id)->where('user_id', Auth::user()->id)->whereBetween('updated_at', [$from, $to])->sum('amount');
    }

    public function consultationrequests(){
        return $this->hasMany(Consultationsrequests::class, 'consultation_id');
    }

}
