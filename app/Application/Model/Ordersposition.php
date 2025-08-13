<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

 class Ordersposition extends Model
{
   public $table = "ordersposition";
   public function events(){
		return $this->belongsTo(Events::class, "events_id");
		}
     const TYPE_Course = 1;
   const TYPE_Event = 2;
   const TYPE_CERTIFICATE = 3;
   const TYPE_DIRECT_PAY = 4;
   const TYPE_SUBSCRIPTION = 5;


     public function user(){
  return $this->belongsTo(User::class, "user_id");
  }
   public function courses(){
  return $this->belongsTo(Courses::class, "courses_id");
  }

  public function certificates(){
    return $this->belongsTo(Certificates::class, "certificate_id");
    }
  
    public function GetTypeCertificateContainerAttribute(){
      $result = Certificatescontainer::where('certificate_id', $this->certificate_id)->where('courses_id', $this->courses_id)->get()->pluck('TitleWithCourse', 'id');

      return $result;
    }

   public function orders(){
  return $this->belongsTo(Orders::class, "orders_id");
  }
     protected $fillable = [
     'events_id',
     'user_id',
     'courses_id',
   'orders_id',
        'amount','notes','certificate_id','shipping_id','status',
        'quantity','unit_price','done',
        'type','currency'
            ];


      public static function removeItemFromCart($id)
      {
          $orderPosition = Ordersposition::findOrfail($id);
          $order = $orderPosition->orders;
          if (!$order) {
              return false;
          }
          // Remove the order position
          $orderPosition->delete();
          // To set Kiosk id Null
          $order->kiosk_id = null;
          $order->update();
      }


         // this is a recommended way to declare event handlers
   public static function boot()
   {
      parent::boot();

      static::deleting(function ($item) { // before delete() method call this
         if($item->type == Ordersposition::TYPE_Course && !Courses::isEnrolledCourse($item->courses_id)){

            if($item->courses->type == Courses::TYPE_BUNDLES){
               foreach($item->courses->courseincludes as $included){
                  $includedCourse = $included->includedCourse;
                  $orderPositions = Ordersposition::where('courses_id', $includedCourse->id)->where('type', Ordersposition::TYPE_CERTIFICATE)->where('user_id', Auth::user()->id)->get();
                  foreach($orderPositions as $orderPosition){
                     $orderPosition->delete();
                  }
               }
               $orderPositions = Ordersposition::where('courses_id', $item->courses_id)->where('type', Ordersposition::TYPE_CERTIFICATE)->where('user_id', Auth::user()->id)->get();
            }else{
               $orderPositions = Ordersposition::where('courses_id', $item->courses_id)->where('type', Ordersposition::TYPE_CERTIFICATE)->where('user_id', Auth::user()->id)->get();
               foreach($orderPositions as $orderPosition){
                  $orderPosition->delete();
               }
            }
         }
         // do the rest of the cleanup...
      });
   }
}
  
