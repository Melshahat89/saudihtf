<?php

use App\Application\Model\AdditionalDiscounts;
use App\Application\Model\Businesscourses;
use App\Application\Model\Businessdata;
use App\Application\Model\Certificates;
use App\Application\Model\Certificatescontainer;
use App\Application\Model\Certificatesenrollment;
use App\Application\Model\Courseenrollment;
use App\Application\Model\Courses;
use App\Application\Model\Events;
use App\Application\Model\Eventsenrollment;
use App\Application\Model\Eventstickets;
use App\Application\Model\Homesettings;
use App\Application\Model\Orders;
use App\Application\Model\Ordersposition;
use App\Application\Model\Payments;
use App\Application\Model\Promotionactive;
use App\Application\Model\Promotions;
use App\Application\Model\Promotionusers;
use App\Application\Model\Searchkeys;
use App\Application\Model\Subscriptionuser;
use App\Application\Model\Transactions;
use App\Application\Model\User;
use App\Mail\OrderConfirm;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Application\Controllers\Traits\QRCodeTrait;




function getShoppingCart($userId=null, $order=null){
    $orderPosition = null;
    $userId = ($userId) ? $userId : Auth::user()->id;
    $order = ($order) ? $order : getCurrentOrder();
    // Ceck if the order position found:
    if($order){
        $orderPosition = Ordersposition::where('orders_id',$order->id)->get();
    }

    return ($orderPosition) ? $orderPosition : [];

}
function getShoppingCartDetailsCount($userId=null, $order=null){
    if(!Auth::check()){
        return [];
    }
    $userId = ($userId) ? $userId : Auth::user()->id;
//          $order = Orders::where('user_id', Auth::user()->id)->
//              where(function ($query) {
//                  $query->where('status', Orders::STATUS_PENDING)
//                      //   ->orWhere('status', Orders::STATUS_VODAFONE)
//                      //   ->orWhere('status', Orders::STATUS_KIOSK)
//                        ;
//              })->orderBy('id', 'DESC')->first();

    $order = ($order) ? $order : getCurrentOrder();


    if(!$order){
        return  [];
    }
    // Ceck if the order position found:
    $orderPositions = Ordersposition::where('orders_id',$order->id)->get();
    $arr = ["certificates"=>0, "courses"=>0];

    foreach($orderPositions as $orderPosition){

        if($orderPosition->certificate_id){
            $arr["certificates"]++;


        }else{
            $arr["courses"]++;
        }
    }

    return $arr;
}

function getShoppingCartCost($userId=null, $order=null){
    if(!Auth::check()){
        return 0;
    }
    $userId = ($userId) ? $userId : Auth::user()->id;
//        $order = Orders::where('user_id', Auth::user()->id)->
//        where(function ($query) {
//            $query->where('status', Orders::STATUS_PENDING)
//                //   ->orWhere('status', Orders::STATUS_VODAFONE)
//                //   ->orWhere('status', Orders::STATUS_KIOSK)
//                  ;
//        })->orderBy('id', 'DESC')->first();

    $order = ($order) ? $order : getCurrentOrder();

    if(!$order){
        return  0;
    }

    // Ceck if the order position found:
    $Cost = Ordersposition::where('orders_id',$order->id)->sum('amount');

    return  ($Cost) ? round($Cost) : 0;

}

function getCurrentPromoCode($userId=null, $type=null){
    if(!Auth::check() AND !($userId)){
        return FALSE;
    }

    $userId = ($userId) ? $userId : Auth::user()->id;
    if($type){
        $promo = Promotionactive::where('user_id', $userId)->where('status',1)->where('type', $type)->orderBy('id', 'ASC')->first();
    }else{
        $promo = Promotionactive::where('user_id', $userId)->where('status',1)->whereNull('type')->orderBy('id', 'ASC')->first();
    }


    if(!$promo){
        return  FALSE;
    }

    return ($promo) ? $promo  : FALSE;

}

function connectPromoWithOrder($promotionObj, $order_id, $userId=null){

    $promotionObj->promotion_usage = $promotionObj->promotion_usage + 1;
    $promotionObj->save();

    $promotionUser = new Promotionusers;
    $promotionUser->promotions_id = $promotionObj->id;
    $promotionUser->user_id = ($userId) ? $userId : Auth::user()->id;
    $promotionUser->used = 1;
    $promotionUser->orders_id = $order_id;
    $promotionUser->save();

    Promotionactive::removeActivePromo($userId);

}


function applyBundleDiscount($orderPositions){

    $discountValue = 60;

    $savedAmount = 0;

    $originalPriceCounter = 0;
    $bundleDiscountPriceCounter = getShoppingCartCost();


    foreach($orderPositions as $orderPosition){


        $basePrice = $orderPosition->courses->priceBase['price'];

        $originalPriceCounter += $orderPosition->courses->originalPrice;

        $orderPosition->amount = $basePrice - ( $basePrice * $discountValue / 100);
        $orderPosition->unit_price = $basePrice - ( $basePrice * $discountValue / 100);
        $orderPosition->save();


    }


    $savedAmount = $originalPriceCounter - $bundleDiscountPriceCounter;



    return round($savedAmount);
}



Function ip_in_range($ip, $range) {
    if (strpos($range, '/') !== false) {
        // $range is in IP/NETMASK format
        list($range, $netmask) = explode('/', $range, 2);
        if (strpos($netmask, '.') !== false) {
            // $netmask is a 255.255.0.0 format
            $netmask = str_replace('*', '0', $netmask);
            $netmask_dec = ip2long($netmask);
            return ( (ip2long($ip) & $netmask_dec) == (ip2long($range) & $netmask_dec) );
        } else {
            // $netmask is a CIDR size block
            // fix the range argument
            $x = explode('.', $range);
            while(count($x)<4) $x[] = '0';
            list($a,$b,$c,$d) = $x;
            $range = sprintf("%u.%u.%u.%u", empty($a)?'0':$a, empty($b)?'0':$b,empty($c)?'0':$c,empty($d)?'0':$d);
            $range_dec = ip2long($range);
            $ip_dec = ip2long($ip);

            # Strategy 1 - Create the netmask with 'netmask' 1s and then fill it to 32 with 0s
            #$netmask_dec = bindec(str_pad('', $netmask, '1') . str_pad('', 32-$netmask, '0'));

            # Strategy 2 - Use math to create it
            $wildcard_dec = pow(2, (32-$netmask)) - 1;
            $netmask_dec = ~ $wildcard_dec;

            return (($ip_dec & $netmask_dec) == ($range_dec & $netmask_dec));
        }
    } else {
        // range might be 255.255.*.* or 1.2.3.0-1.2.3.255
        if (strpos($range, '*') !==false) { // a.b.*.* format
            // Just convert to A-B format by setting * to 0 for A and 255 for B
            $lower = str_replace('*', '0', $range);
            $upper = str_replace('*', '255', $range);
            $range = "$lower-$upper";
        }

        if (strpos($range, '-')!==false) { // A-B format
            list($lower, $upper) = explode('-', $range, 2);
            $lower_dec = (float)sprintf("%u",ip2long($lower));
            $upper_dec = (float)sprintf("%u",ip2long($upper));
            $ip_dec = (float)sprintf("%u",ip2long($ip));
            return ( ($ip_dec>=$lower_dec) && ($ip_dec<=$upper_dec) );
        }

        echo 'Range argument is not in 1.2.3.4/24 or 1.2.3.4/255.255.255.0 format';
        return false;
    }

}


function distCourseTransactions($course, $course_price, $payment, $promoRow = null, $actualCourse, $date=null){

    $course_price = round($course_price);

    //Save Instructor
    if ($actualCourse->instructor_per && $actualCourse->instructor_id ){
        $Transactions = new Transactions();
        $Transactions->user_id = $actualCourse->instructor_id ;
        $Transactions->payments_id = $payment->id;
        $Transactions->courses_id = $actualCourse->id;
        $Transactions->price = $course_price;
        $Transactions->currency = "EGP";
        $Transactions->percent =  ($promoRow) ? $promoRow->affiliate_perc : $actualCourse->instructor_per;
        $Transactions->amount =  ($promoRow) ? ($course_price * $promoRow->affiliate_perc) / 100 : ($course_price * $actualCourse->instructor_per) / 100;
        $Transactions->type =  Transactions::INSTRUCTOR;
        $Transactions->date = ($date) ? $date : date('Y-m-d H:i:s');
        $Transactions->save();

    }
    //Save affiliate1
    if ($actualCourse->affiliate1_per && $actualCourse->instructor['affiliate']){
        $Transactions = new Transactions();
        $Transactions->user_id = $actualCourse->instructor['affiliate']['id'];
        $Transactions->payments_id = $payment->id;
        $Transactions->courses_id = $actualCourse->id;
        $Transactions->price = $course_price;
        $Transactions->currency = "EGP";
        $Transactions->percent =  $actualCourse->affiliate1_per;
        $Transactions->amount =  ($course_price * $actualCourse->affiliate1_per) / 100;
        $Transactions->type =  Transactions::AFFILIATE1;
        $Transactions->date = ($date) ? $date : date('Y-m-d H:i:s');
        $Transactions->save();
    }
    //Save affiliate2
    if ($actualCourse->affiliate2_per &&  $actualCourse->instructor['affiliate']['affiliate']){
        $Transactions = new Transactions();
        $Transactions->user_id =  $actualCourse->instructor['affiliate']['affiliate']['id'];
        $Transactions->payments_id = $payment->id;
        $Transactions->courses_id = $actualCourse->id;
        $Transactions->price = $course_price;
        $Transactions->currency = "EGP";
        $Transactions->percent =  $actualCourse->affiliate2_per;
        $Transactions->amount =  ($course_price * $actualCourse->affiliate2_per) / 100;
        $Transactions->type =  Transactions::AFFILIATE2;
        $Transactions->date = ($date) ? $date : date('Y-m-d H:i:s');
        $Transactions->save();
    }
    //Save affiliate3
    if ($actualCourse->affiliate3_per &&  $actualCourse->instructor['affiliate']['affiliate']['affiliate']){
        $Transactions = new Transactions();
        $Transactions->user_id =  $actualCourse->instructor['affiliate']['affiliate']['affiliate']['id'];
        $Transactions->payments_id = $payment->id;
        $Transactions->courses_id = $actualCourse->id;
        $Transactions->price = $course_price;
        $Transactions->currency = "EGP";
        $Transactions->percent =  $actualCourse->affiliate3_per;
        $Transactions->amount =  ($course_price * $actualCourse->affiliate3_per) / 100;
        $Transactions->type =  Transactions::AFFILIATE3;
        $Transactions->date = ($date) ? $date : date('Y-m-d H:i:s');
        $Transactions->save();
    }
    //Save affiliate4
    if ($actualCourse->affiliate4_per &&  $actualCourse->instructor['affiliate']['affiliate']['affiliate']['affiliate']){
        $Transactions = new Transactions();
        $Transactions->user_id =  $actualCourse->instructor['affiliate']['affiliate']['affiliate']['affiliate']['id'];
        $Transactions->payments_id = $payment->id;
        $Transactions->courses_id = $actualCourse->id;
        $Transactions->price = $course_price;
        $Transactions->currency = "EGP";
        $Transactions->percent =  $actualCourse->affiliate4_per;
        $Transactions->amount =  ($course_price * $actualCourse->affiliate4_per) / 100;
        $Transactions->type =  Transactions::AFFILIATE4;
        $Transactions->date = ($date) ? $date : date('Y-m-d H:i:s');
        $Transactions->save();
    }


}

function distEventTransactions($event, $event_price, $payment, $promoRow = null){

    //Save Instructor
    if ($event->instructor_per && $event->eventsdata->user_id) {
        $Transactions = new Transactions();
        $Transactions->user_id = $event->eventsdata->user_id;
        $Transactions->payments_id = $payment->id;
        $Transactions->events_id = $event->id;
        $Transactions->price = $event_price;
        $Transactions->currency = getCurrency();
        $Transactions->percent =  ($promoRow) ? $promoRow->affiliate_perc : $event->instructor_per;
        $Transactions->amount =  ($promoRow) ? ($event_price * $promoRow->affiliate_perc) / 100 : ($event_price * $event->instructor_pe) / 100;
        $Transactions->type =  Transactions::EVENTDATA;
        $Transactions->date = date('Y-m-d H:i:s');
        $Transactions->save();
    }

}

function updatePromoUsage($itemsArr, $order){

    $promoCode = getCurrentPromoCode();
    if ($promoCode) {
        //Check the promo again
        $promoRow = $promoCode->promotions;
        if ($promoRow && Promotions::isValid($promoRow)) {
            // Increase the promo usage count
            //check if the user make a benifet from the promo code or not:
            //fetch the promo code courses

            $appliedCourses = $promoRow->promotioncourses;

            $promoCousesIncluded = false;
            if ($appliedCourses) {
                foreach ($appliedCourses as $appliedCourse) {
                    if (in_array($appliedCourse->courses_id, Arr::pluck($itemsArr['courses'], 'courses_id'))) {

                        $promoCousesIncluded = true;
                        break;
                    }
                }
            }

            if ($promoCousesIncluded) {
                $existPromoUser = Promotionusers::where('promotions_id', $promoRow->id)->where('user_id', Auth::user()->id)->first();
                if ($existPromoUser && $existPromoUser->used == 0) {
                    //flag the user as he used the promo code in this order
                    $existPromoUser->used = 1;
                    $existPromoUser->orders_id = $order->id;
                    if ($existPromoUser->save()) {
                        //Increase the usage
                        $promoRow->promotion_usage = $promoRow->promotion_usage + 1;
                        $promoRow->save();
                        Promotionactive::removeActivePromo();
                    }
                }
            }
        }
    }

}

function getCurrentOrder($userId=null){

    $order = Orders::where('user_id', ($userId) ? $userId : Auth::user()->id)
        ->where('status', Orders::STATUS_PENDING)
        ->whereNull('subscription_type')
//        ->where('subscription_type', '!=', Orders::SUBSCRIPTON_MONTHLY)
//        ->Where('subscription_type', '!=', Orders::SUBSCRIPTION_ANNUAL)



//        ->where(function ($query) {
//            $query->where('status', Orders::STATUS_PENDING)
//            ->where('subscription_type', '!=', Orders::SUBSCRIPTON_MONTHLY)
//            ->Where('subscription_type', '!=', Orders::SUBSCRIPTION_ANNUAL)
//            ;
//        })
//        ->where(function ($query) {
//            $query->where('subscription_type', '<>', Orders::SUBSCRIPTON_MONTHLY)
//            ->Where('subscription_type', '<>', Orders::SUBSCRIPTION_ANNUAL);
//        })
        ->orderBy('id', 'DESC')->first();




    return (isset($order)) ? $order : null;
}

function extractOrderItemTypes($order=null, $userId=null){
    if(!$order && getCurrentOrder()){
        $order = getCurrentOrder();
    }
    $itemsArr = getShoppingCart(($userId) ? $userId : Auth::user()->id, $order);
    $array = array();

    foreach($itemsArr as $item){

        if($item->type == Ordersposition::TYPE_Course){
            $array["courses"][] = $item;

        }elseif($item->type == Ordersposition::TYPE_Event){
            $array["events"][] = $item;
        }elseif($item->type == Ordersposition::TYPE_CERTIFICATE){
            $array["certificates"][] = $item;
        }elseif($item->type == Ordersposition::TYPE_DIRECT_PAY){
            $array['directpay'][] = $item;
        }

    }

    return $array;

}

function payPalExtractOrderItemTypes($orderItems){

    $array = array();
    $sum = 0;

    foreach($orderItems as $orderItem){

        $sum += $orderItem->payments->captures[0]->amount->value;

        $item = Ordersposition::findOrFail($orderItem->reference_id);

        if($item->type == Ordersposition::TYPE_Course){
            $array["courses"][] = $item;

        }elseif($item->type == Ordersposition::TYPE_Event){
            $array["events"][] = $item;
        }elseif($item->type == Ordersposition::TYPE_CERTIFICATE){
            $array["certificates"][] = $item;
        }elseif($item->type == Ordersposition::TYPE_DIRECT_PAY){
            $array['directpay'][] = $item;
        }

    }

    return ['types' => $array, 'totalCost' => $sum];
}

function calculateCourseEnrollmentDates($id, $userId){

    $startDate = date('Y-m-d H:i:s');
    $course = Courses::findOrFail($id);
    $user = ($userId) ? User::findOrFail($userId) : Auth::user();
    $businessdata = Businessdata::where('status', 1)->whereDate('start_time', '<=', $startDate)
        ->whereDate('end_time', '>=', $startDate)->find($user->businessdata_id);


    // If the user has a valid and unexpired businessdata

    if($user->businessdata_id && $businessdata){

        $businessCourses = Businesscourses::where('courses_id', $id)->where('businessdata_id', $businessdata->id)->first();

        if ($businessCourses) {
            $endDate = $businessdata->end_time;
        }else{
            if ($course->full_access == Courses::FULL_TIME_ACCESS) {
                $addedTime = 10950;
            } else {
                // $addedTime = $course->access_time;
                $addedTime = 10950;
            }


            $date = strtotime($startDate);
            $date = strtotime("+" . $addedTime . " day", $date);
            $date = date('Y-m-d H:i:s', $date);

            $endDate = date('Y-m-d H:i:s', strtotime($date . "+4 hours"));
        }

    }else{

        // if the user is not a business user

        if ($course->full_access == Courses::FULL_TIME_ACCESS) {
            $addedTime = 10950;
        } else {
            // $addedTime = $course->access_time;
            $addedTime = 10950;
        }


        $date = strtotime($startDate);
        $date = strtotime("+" . $addedTime . " day", $date);
        $date = date('Y-m-d H:i:s', $date);

        $endDate = date('Y-m-d H:i:s', strtotime($date . "+4 hours"));

    }

    $array = array();

    $array["start_date"] = $startDate;
    $array["end_date"] = $endDate;

    return $array;
}



function enrollCourse($id, $userId=null, $subscriptionType=null, $endDate=null, $orderId=null){

    $enrolled = Courses::isEnrolledCourse($id, $userId);
    $user = User::findOrFail(($userId) ? $userId : Auth::user()->id);
    $Course = Courses::findOrfail($id);

    $startEndDates = calculateCourseEnrollmentDates($id, $userId, $subscriptionType);

    if (!$enrolled) {
        $enroll = new Courseenrollment();
        $enroll->user_id = ($userId) ? $userId : Auth::user()->id;
        $enroll->courses_id = $id;
        $enroll->start_time = $startEndDates["start_date"];
        $enroll->end_time = ($endDate) ? $endDate : $startEndDates["end_date"];
        $enroll->orders_id = $orderId;


        $businessCourses = Businesscourses::where('courses_id', $id)->where('businessdata_id', $user->businessdata_id)->first();


        if($user->businessdata_id && isValidBusiness($user->businessdata_id) && $businessCourses){
            $enroll->type = Courseenrollment::TYPE_B2B;
            $enroll->businessdata_id = $user->businessdata_id;
        }


        if($user->subscription && $Course->type == Courses::TYPE_COURSE){
            $enroll->subscriptionuser_id = $user->subscription->id;
        }

        $enroll->save();


        if(count($Course->courseincludes) > 0){

            //Fetch the included Courses
            foreach ($Course->courseincludes as $insideCourse) {
                $enrolledInside = Courses::isEnrolledCourse($insideCourse->includedCourse->id, $userId);
                if (!$enrolledInside) {
                    $Course = Courses::findOrfail($insideCourse->includedCourse->id);

                    $startEndDates = calculateCourseEnrollmentDates($Course->id, $userId, $subscriptionType);

                    $enroll = new Courseenrollment();
                    $enroll->user_id = ($userId) ? $userId : Auth::user()->id;
                    $enroll->courses_id = $insideCourse->includedCourse->id;

                    $enroll->start_time = $startEndDates["start_date"];
                    $enroll->end_time = $startEndDates["end_date"];
                    $enroll->orders_id = $orderId;

                    $businessCourses = Businesscourses::where('courses_id', $id)->where('businessdata_id', $user->businessdata_id)->first();
                    if($user->businessdata_id && isValidBusiness($user->businessdata_id) && $businessCourses){
                        $enroll->type = Courseenrollment::TYPE_B2B;
                        $enroll->businessdata_id = $user->businessdata_id;
                    }

                    $enroll->save();
                }
            }

        }



        // Save Log
        $log = new \App\Application\Model\Log();
        $log->model = "courseenrollments";
        $log->action = "enroll";
        $log->status = "Success";
        $log->user_id = $user->id;
        $log->model_id = $Course->id;
        $log->courses_id = $Course->id;
        $log->type = \App\Application\Model\Log::TYPE_USER;
        $log->save();
    }

}

function unEnrollCourse($orderId){
    $enrollments = Courseenrollment::where('orders_id', $orderId)->get();
    foreach($enrollments as $enrollment){
        $enrollment->delete();
    }
}

function enrollEvent($id, $userId=null){

    $enrolled = Events::isEnrolledEvent($id, $userId);
    $event = Events::findOrfail($id);
    $user = ($userId) ? User::findOrFail($userId) : Auth::user();
    if (!$enrolled) {

        $enroll = new Eventsenrollment();
        $enroll->user_id = ($userId) ? $userId : Auth::user()->id;
        $enroll->events_id = $id;
        $enroll->save();

        //Generate Ticket
        $ticket = new Eventstickets();
        $ticket->name = $user->fullname_lang;
        $ticket->email = $user->email;
        $ticket->code = generateRandomString(8);
        $ticket->user_id = $user->id;
        $ticket->events_id = $event->id;
        $ticket->eventsdata_id = $event->eventsdata->id;
        $ticket->save();
    }
}


function enrollCertificate($courses_id, $certificate_id, $userId=null, $orderId=null){

    $enrolled = Certificates::isBoughtCertificate($courses_id, $certificate_id);
    if(!$enrolled){

        $enroll = new Certificatesenrollment();
        $enroll->user_id = ($userId) ? $userId : Auth::user()->id;
        $enroll->courses_id = $courses_id;
        $enroll->certificate_id = $certificate_id;
        $enroll->orders_id = $orderId;
        $enroll->save();

        // Save Log
        $log = new \App\Application\Model\Log();
        $log->model = "certificatesenrollment";
        $log->action = "enroll";
        $log->status = "Success";
        $log->user_id = Auth::user()->id;
        $log->model_id = $certificate_id;
        $log->courses_id = $courses_id;
        $log->type = \App\Application\Model\Log::TYPE_USER;
        $log->save();
    }
}

function unEnrollCertificate($orderId){
    $enrollments = Certificatesenrollment::where('orders_id', $orderId)->get();
    foreach($enrollments as $enrollment){
        $enrollment->delete();
    }
}

function setConsultantTransaction($order){

    //Save Consultant
    if ($order->consultationrequest->consultation->consultant_perc){
        $Transactions = new Transactions();
        $Transactions->user_id = $order->user_id;
        $Transactions->payments_id = $order->payments_id;
        $Transactions->consultation_id = $order->consultationrequest->consultation_id;
        $Transactions->price = round($order->payments->amount);
        $Transactions->currency = "EGP";
        $Transactions->percent =  $order->consultationrequest->consultation->consultant_perc;
        $Transactions->amount =  round(($order->payments->amount * $order->consultationrequest->consultation->consultant_perc) / 100);
        $Transactions->type =  Transactions::INSTRUCTOR;
        $Transactions->date = $order->consultationrequest->scheduled_at;
        $Transactions->save();

    }
}

function setInstructorAffTransactions($course, $course_price, $payment, $currency, $promoRow=null){

    $exchangeRate = Payments::exchangeRate();

    if(count($course->courseincludes) > 0){

        //The course has included courses
        $includedCoursesOriginalPricesSum =  $course->includedCoursesPriceSum($currency);

        if($includedCoursesOriginalPricesSum >= $course_price){
            /**The sum of the included courses price is more than the main course price itself
            Such as bundles - Don't calculate cost for lectures**/

            $includedCoursesPercentage = ($course_price / $includedCoursesOriginalPricesSum) * 100;

            foreach($course->courseincludes as $includedCourse){

                if($currency == "USD"){
                    $includedCoursePrice = round((($includedCourse->includedCourse->UsdOriginalPrice * $exchangeRate) * $includedCoursesPercentage) / 100);
                }else{
                    $includedCoursePrice = round(($includedCourse->includedCourse->EgpOriginalPrice * $includedCoursesPercentage) / 100);
                }

                distCourseTransactions($course, $includedCoursePrice, $payment, $promoRow, $includedCourse->includedCourse);
            }

        }else{

            /**The sum of the included courses price is less than the main course price itself
            Such as masters - WILL calculate cost for lectures**/

            $lecturesPrice = $course_price - $includedCoursesOriginalPricesSum;
            distCourseTransactions($course, $lecturesPrice, $payment, $promoRow, $course);

            foreach($course->courseincludes as $includedCourse){

                if($currency == "USD"){
                    $includedCoursePrice = ($includedCourse->includedCourse->UsdOriginalPrice * $exchangeRate);
                }else{
                    $includedCoursePrice = ($includedCourse->includedCourse->EgpOriginalPrice);
                }

                distCourseTransactions($course, $includedCoursePrice, $payment, $promoRow, $includedCourse->includedCourse);

            }

        }

    }else{

        //The course doesn't have included courses

        distCourseTransactions($course, $course_price, $payment, $promoRow, $course);

    }
}

function setInstructorAffTransactions2($course, $course_price, $payment, $currency, $promoRow=null, $date=null){
    if(count($course->courseincludes) > 0){
        $totalSeconds = $course->CourseLength;
        $costPerSecond = ($course_price / $totalSeconds);
        foreach($course->courseincludes as $includedCourse){
            $costForCourse = ($includedCourse->includedCourse->BaseCourseLength) * $costPerSecond;
            $course_price = $course_price - $costForCourse;
            distCourseTransactions($course, $costForCourse, $payment, $promoRow, $includedCourse->includedCourse, $date);
        }

        if($course_price > 0 && $course->instructor_per){

            distCourseTransactions($course, $course_price, $payment, $promoRow, $course, $date);
        }
    }else{
        //The course doesn't have included courses
        distCourseTransactions($course, $course_price, $payment, $promoRow, $course, $date);
    }
}

function createDirectPayOrder($course){

    $order = new Orders();
    $order->status = Orders::STATUS_DIRECTBUY;
    $order->user_id = Auth::user()->id;
    $order->currency = getCurrency();
    $order->save();

    //Save the item in the cart
    $orderPosition = new Ordersposition();
    $orderPosition->amount = $course->OriginalPrice;
    $orderPosition->quantity = 1;
    $orderPosition->unit_price = $course->OriginalPrice;
    $orderPosition->currency = getCurrency();
    $orderPosition->orders_id = $order->id;
    $orderPosition->courses_id = $course->id;
    $orderPosition->user_id = Auth::user()->id;
    $orderPosition->type = Ordersposition::TYPE_Course;
    $orderPosition->save();

    return $order;
}

function newDirectPayOrder($amount, $currency){

    $order = new Orders();
    $order->status = Orders::STATUS_DIRECTBUY;
    $order->user_id = Auth::user()->id;
    $order->currency = $currency;
    $order->save();

    $orderPosition = new Ordersposition();
    $orderPosition->amount = $amount;
    $orderPosition->orders_id = $order->id;
    $orderPosition->user_id = Auth::user()->id;
    $orderPosition->unit_price = $amount;
    $orderPosition->type = Ordersposition::TYPE_DIRECT_PAY;
    $orderPosition->currency = $currency;
    $orderPosition->save();

    return $orderPosition;

}

function saveFreeOrder($paymentsData){


    //save the payement
    $payment = new Payments;
    $payment->operation = Payments::OPERATION_DEPOSIT;
    $payment->amount = (int) $paymentsData->amount / 100;
    $payment->currency_id = "EGP";
    $payment->user_id = Auth::user()->id;
    $payment->receiver_id = 1;
    $payment->status = Payments::STATUS_SUCCEEDED;
    $payment->orders_id = $paymentsData->order->id;

    if ($payment->save()) {


        if ($paymentsData->order && $payment->status == Payments::STATUS_SUCCEEDED) {

            $itemsArr = extractOrderItemTypes($payment->order);

            foreach($itemsArr as $key => $values){

                switch($key){

                    case 'courses':
                        foreach($values as $value){
                            enrollCourse($value->courses_id, null, null, null, $paymentsData->order->id);
                        }
                        break;


                    case 'events':
                        foreach($values as $value){
                            enrollEvent($value->events_id);
                        }
                        break;

                    default:
                }

            }


            // Link the order with the payement:
            $paymentsData->order->status = Orders::STATUS_SUCCEEDED;
            $paymentsData->order->payments_id = $payment->id;

            if ($paymentsData->order->save()) {

                updatePromoUsage($itemsArr, $paymentsData->order);

            }
        }

        // alert()->success(trans('website.Thank you! Your request was successfully submitted!'), trans('website.Success'));

        // Send order email to the customer
        // Emails::instance()->sendOrderEmail($this->oAuthUser, $payment, $order);
        Mail::to(Auth::user()->email)->send(new OrderConfirm($paymentsData->order, Auth::user(), getShoppingCartCost()));
        User::addNotification([auth()->user()->id], trans('messages.notificationPurchaseTitle'), trans('messages.notificationPurchaseDescription'), '/account/myCourses');

        return redirect('account/myCourses');
    }

}

function coursesMultiSelect($selectName, $selectId, $userId){

    $courses = Courses::where('type', Courses::TYPE_COURSE)->get();
    $diplomas = Courses::where('type', Courses::TYPE_DIPLOMAS)->get();
    $masters = Courses::where('type', Courses::TYPE_MASTERS)->get();
    $bundles = Courses::where('type', Courses::TYPE_BUNDLES)->get();

    $out = '<select multiple id="' . $selectId . '" name="' . $selectName . '">';

    if($courses){
        $out .= '<optgroup label="Courses">';
        foreach($courses as $course){

            if(isset($userId) && Courses::isEnrolledCourse($course->id, $userId)){
                $out .= '<option value="' . $course->id . '" selected>';
            }else{
                $out .= '<option value="' . $course->id . '">';
            }

            $out .= $course->title_lang . '</option>';
        }

        $out .= '</optgroup>';
    }

    if($diplomas){
        $out .= '<optgroup label="Diplomas">';
        foreach($diplomas as $course){

            if(isset($userId) && Courses::isEnrolledCourse($course->id, $userId)){
                $out .= '<option value="' . $course->id . '" selected>';
            }else{
                $out .= '<option value="' . $course->id . '">';
            }

            $out .= $course->title_lang . '</option>';
        }

        $out .= '</optgroup>';
    }

    if($masters){
        $out .= '<optgroup label="Masters">';
        foreach($masters as $course){

            if(isset($userId) && Courses::isEnrolledCourse($course->id, $userId)){
                $out .= '<option value="' . $course->id . '" selected>';
            }else{
                $out .= '<option value="' . $course->id . '">';
            }

            $out .= $course->title_lang . '</option>';
        }

        $out .= '</optgroup>';
    }

    if($bundles){
        $out .= '<optgroup label="Bundles">';
        foreach($bundles as $course){

            if(isset($userId) && Courses::isEnrolledCourse($course->id, $userId)){
                $out .= '<option value="' . $course->id . '" selected>';
            }else{
                $out .= '<option value="' . $course->id . '">';
            }

            $out .= $course->title_lang . '</option>';
        }

        $out .= '</optgroup>';
    }

    $out .= '</select>';

    return $out;
}

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    //check if exist code
    $code = Eventstickets::where('code',$randomString)->first();
    if($code){
        generateRandomString($length);
    }

    return $randomString;
}

function hideIncludedCourses(){

    $now = date('Y-m-d');
    $courses = Courses::whereHas('courseenrollment', function($query) use ($now){
        return $query->where('user_id',Auth::user()->id)->whereDate('start_time', '<=', $now)
            ->whereDate('end_time', '>=', $now)
            ->where('status', 1)->with('courses');
    })->get();

    foreach($courses as $course){
        foreach($course->courseincludes as $courseincludes){
            foreach($courses as $key => $course2){
                if($courseincludes->includedCourse->id == $course2->id){
                    unset($courses[$key]);
                }
            }
        }

    }

    return $courses;
}

function saveSearchKey($key){

    if(Auth::check()){
        $keyword = Searchkeys::where('word', $key)->where('user_id', Auth::user()->id)->first();

        if(!$keyword){
            $keyword = new Searchkeys();
            $keyword->word = $key;
            $keyword->user_id = Auth::user()->id;
            $keyword->save();
        }
    }else{
        $keyword = new Searchkeys();
        $keyword->word = $key;
        $keyword->save();
    }
}

function getSearchKeys(){

    $keywords = null;

    if(Auth::check()){
        $keywords = Searchkeys::where('user_id', Auth::user()->id)->limit(2)->get();
    }

    return $keywords;
}

function getCoursesCountFromOrder(){
    $order = getCurrentOrder();
    $count = 0;

    // if($order->ordersposition->exists() AND ($order->ordersposition) > 0 ){
    foreach($order->ordersposition as $position){
        if($position->type == Ordersposition::TYPE_Course){
            $count++;
        }
        // }
    }

    return $count;

}

function getAdditionalDiscount(){

    //Make sure no promocode is active
    if(!getCurrentPromoCode()){
        $order = getCurrentOrder();
        $count = getCoursesCountFromOrder();

        if($count == 1){
            return AdditionalDiscounts::where('name', 'ONLY_1_COURSE')->where('status', 1)->first();

        }elseif($count >= 2){
            return AdditionalDiscounts::where('name', '2_PLUS_COURSE')->where('status', 1)->first();
        }
    }

    return false;
}

function showDiscountPerc(){

    if(getCurrency() == "EGP"){

        if(getCurrentPromoCode() && getCurrentPromoCode()->promotions->value_for_egp){
            if(getCurrentPromoCode()->promotions->type == 1){
                return '<strong>' . trans('website.Congratulations, You are enjoying an extra') . ' ' . getCurrentPromoCode()->promotions->value_for_egp . '%' . ' ' . trans('website.Extra') . '</strong>';
            }else{
                return '<strong>' . trans('website.Congratulations, You are enjoying an extra') . ' ' . getCurrentPromoCode()->promotions->value_for_egp . ' ' . trans('website.Extra') . '</strong>';
            }
        }
//        elseif(getAdditionalDiscount()){
//            return '<strong>' . trans('website.Congratulations, You are enjoying an extra') . ' ' . getAdditionalDiscount()->egp_disc . '%' . ' ' . trans('website.Extra') . '</strong>';
//        }

    }else{
        if(getCurrentPromoCode() && getCurrentPromoCode()->promotions->value_for_other_currencies){
            if(getCurrentPromoCode()->promotions->type == 1){
                return '<strong>' . trans('website.Congratulations, You are enjoying an extra') . ' ' . getCurrentPromoCode()->promotions->value_for_other_currencies . '%' . ' ' . trans('website.Extra') . '</strong>';
            }else{
                return '<strong>' . trans('website.Congratulations, You are enjoying an extra') . ' ' . getCurrentPromoCode()->promotions->value_for_other_currencies . ' ' . trans('website.Extra') . '</strong>';
            }
        }
//        elseif(getAdditionalDiscount()){
//            return '<strong>' . trans('website.Congratulations, You are enjoying an extra') . ' ' . getAdditionalDiscount()->usd_disc . '%' . ' ' . trans('website.Extra') . '</strong>';
//        }
    }

    return false;
}

function getCurrentCartOrder(){
    $order = Orders::where('user_id', Auth::user()->id)
        ->where('status', Orders::STATUS_PENDING)
        ->where('type', '!=', Orders::TYPE_B2B)
        ->where('type', '!=', Orders::TYPE_B2C)
        ->orderBy('id', 'DESC')
        ->first();

    return ($order) ? $order : null;
}


function createBusinessInitialOrder($subType, $b_type, $amount, $currency, $userId=null, $employee=null){

    $homeSettings = \App\Application\Model\Homesettings::findOrFail(1);

    if(!$employee){
        //Not Offline Order
        if($subType == \App\Application\Model\Subscriptionuser::SUBSCRIPTION_YEARLY){
            $amount = $homeSettings->YearlyB2cSubscriptionPrice;
        }else{
            //Monthly
            $amount = $homeSettings->MonthlyB2cSubscriptionPrice;
        }
    }


    $order = new Orders();
    $order->subscription_type = $subType;
    $order->type = $b_type;
    $order->status = Orders::STATUS_PENDING;
    $order->user_id = ($userId) ? $userId : Auth::user()->id;
    $order->emp_id = $employee;
    $order->currency = $currency;
    $order->save();

    $orderPosition = new Ordersposition();
    $orderPosition->amount = $amount;
    $orderPosition->orders_id = $order->id;
    $orderPosition->user_id = Auth::user()->id;
    $orderPosition->quantity = 1;
    $orderPosition->unit_price = $amount;
    $orderPosition->currency = $currency;
    $orderPosition->type = Ordersposition::TYPE_SUBSCRIPTION;
    $orderPosition->save();

    return $order;
}


function createB2bInitialOrder($subType, $numberOfUsers, $amount, $currency){


    $homeSettings = Homesettings::findOrFail(1);

    if($subType == Subscriptionuser::SUBSCRIPTION_YEARLY){
        $amount = ($homeSettings->YearlyB2bSubscriptionPrice * $numberOfUsers);
    }else{
        //Monthly
        $amount = ($homeSettings->b2b_monthly * $numberOfUsers);
    }

    $order = new Orders();
    $order->type = Orders::TYPE_B2B;
    $order->subscription_type = $subType;
    $order->status = Orders::STATUS_PENDING;
    $order->user_id = Auth::user()->id;
    $order->business_licenses = $numberOfUsers;
    $order->save();

    $orderPosition = new Ordersposition();
    $orderPosition->amount = $amount;
    $orderPosition->orders_id = $order->id;
    $orderPosition->user_id = Auth::user()->id;
    $orderPosition->quantity = 1;
    $orderPosition->unit_price = $amount;
    $orderPosition->currency = $currency;
    $orderPosition->save();

    return $order;
}

function completeBusinessOrder($order,$payment){

    $user = User::findOrFail($order->user_id);

    $startTime = Carbon::now()->format('Y-m-d');
    if($order->subscription_type == Orders::SUBSCRIPTON_MONTHLY){
        //Monthly Subscription
        $endTime = Carbon::now()->addDays(31)->format('Y-m-d');
    }else{
        //Annual Subscription
        $endTime = Carbon::now()->addDays(366)->format('Y-m-d');
    }

    if($order->type == Orders::TYPE_B2B){
        $businessData = new Businessdata();
        $businessData->name = $user->name;
        $businessData->discount_type = 1;
        $businessData->discount_value = 100;
        $businessData->discount_value_dollar = 100;
        $businessData->automatically_license = 1;
        $businessData->status = 1;
        $businessData->user_id = $user->id;
        $businessData->licenses= $order->business_licenses;
        $businessData->start_time = $startTime;
        $businessData->end_time = $endTime;
        $businessData->order_id = $order->id;
        $businessData->save();

        $user->group_id = User::TYPE_BUSINESS;
        $user->businessdata_id = $businessData->id;
        $user->save();


        //Enroll Business Courses
        $AllCourses = Courses::where('published', 1)->get();
        foreach ($AllCourses as $course){
            $businessCourse = new Businesscourses();
            $businessCourse->courses_id = $course->id;
            $businessCourse->businessdata_id = $businessData->id;
            $businessCourse->status = 1;
            $businessCourse->save();
        }
    }else{
        $subscriptionuser = new Subscriptionuser();
        $subscriptionuser->user_id = $user->id;
        $subscriptionuser->subscription_id = $order->subscription_type;
        $subscriptionuser->start_date = $startTime;
        $subscriptionuser->end_date = $endTime;
        $subscriptionuser->amount = $payment->amount;
        $subscriptionuser->b_type = $order->type;
        $subscriptionuser->is_active = 1;
        $subscriptionuser->orders_id = $order->id;
        $subscriptionuser->save();
    }
}


function generateQrCode($url){

    $qr = new QRCodeTrait();
    $qr->url($url);

    return $qr->qrCode(500);

}
function isValidBusiness($businessDataId){
    $businessdata = Businessdata::find($businessDataId);
    $now = Carbon::now()->format('Y-m-d');

    if(isset($businessdata) && $businessdata->status == Businessdata::STATUS_ACTIVE && $businessdata->end_time >= $now){
        return true;
    }else{
        return false;
    }
}

function finishedCourseInDays($course, $user){

    if($course->quiz){

        $exam = \App\Application\Model\Quizstudentsstatus::where('user_id', $user->id)->where('quiz_id', $course->quiz->id)->where('passed', 1)->first();
        $enrollment = Courseenrollment::where('user_id', $user->id)->where('courses_id', $course->id)->orderBy('id', 'DESC')->first();

        if($exam && $enrollment){
            $enrollDate = Carbon::createFromFormat('Y-m-d H:s:i', $enrollment->created_at);
            $examDate = Carbon::createFromFormat('Y-m-d H:s:i', $exam->updated_at);

            $diffInDays = $examDate->diffInDays($enrollDate);
            $diffInHours = $examDate->diffInHours($enrollDate);
            $diffInMins = $examDate->diffInMinutes($enrollDate);

            if($diffInDays >= 1){
                return $diffInDays . " " . trans('businessdata.Days');
            }elseif($diffInHours >= 1){
                return $diffInHours . " " . trans('businessdata.Hours');
            }else{
                return $diffInMins . " " . trans('businessdata.Minutes');
            }
        }

        return false;
    }

    return false;

}
