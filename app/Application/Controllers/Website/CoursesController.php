<?php

namespace App\Application\Controllers\Website;

use Alert;
use App\Application\Controllers\AbstractController;
use App\Application\Model\Businesscourses;
use App\Application\Model\Businessdata;
use App\Application\Model\Businessinputfields;
use App\Application\Model\Businessinputfieldsresponses;
use App\Application\Model\Categorie;
use App\Application\Model\Categories;
use App\Application\Model\Certificates as ModelCertificates;
use App\Application\Model\Courseenrollment;
use App\Application\Model\Courselectures;
use App\Application\Model\Courses;
use App\Application\Model\Coursewishlist;
use App\Application\Model\Events;
use App\Application\Model\Futurex;
use App\Application\Model\FutureXIntegration;
use App\Application\Model\Homesettings;
use App\Application\Model\Log;
use App\Application\Model\Orders;
use App\Application\Model\Ordersposition;
use App\Application\Model\Payments;
use App\Application\Model\PostAffiliateProIntegration;
use App\Application\Model\Quiz;
use App\Application\Model\Quizstudentsanswers;
use App\Application\Model\Quizstudentsstatus;
use App\Application\Model\Sectionquiz;
use App\Application\Model\Sectionquizstudentanswer;
use App\Application\Model\Sectionquizstudentstatus;
use App\Application\Requests\Website\Courses\AddRequestCourses;
use App\Application\Requests\Website\Courses\UpdateRequestCourses;
use App\Mail\OrderConfirm;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Application\Model\Progress;
use App\Application\Model\User;
use App\Mail\ExamPassedEmail;
use Certificates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Application\Model\FacebookConversionsAPI;


class CoursesController extends AbstractController
{

    public function __construct(Courses $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $items = $this->model;

        if (request()->has('from') && request()->get('from') != '') {
            $items = $items->whereDate('created_at', '>=', request()->get('from'));
        }

        if (request()->has('to') && request()->get('to') != '') {
            $items = $items->whereDate('created_at', '<=', request()->get('to'));
        }

        if (request()->has("title") && request()->get("title") != "") {
            $items = $items->where("title", "like", "%" . request()->get("title") . "%");
        }

        if (request()->has("slug") && request()->get("slug") != "") {
            $items = $items->where("slug", "=", request()->get("slug"));
        }

        if (request()->has("description") && request()->get("description") != "") {
            $items = $items->where("description", "like", "%" . request()->get("description") . "%");
        }

        if (request()->has("welcome_message") && request()->get("welcome_message") != "") {
            $items = $items->where("welcome_message", "like", "%" . request()->get("welcome_message") . "%");
        }

        if (request()->has("congratulation_message") && request()->get("congratulation_message") != "") {
            $items = $items->where("congratulation_message", "like", "%" . request()->get("congratulation_message") . "%");
        }

        if (request()->has("type") && request()->get("type") != "") {
            $items = $items->where("type", "=", request()->get("type"));
        }

        if (request()->has("skill_level") && request()->get("skill_level") != "") {
            $items = $items->where("skill_level", "=", request()->get("skill_level"));
        }

        if (request()->has("language_id") && request()->get("language_id") != "") {
            $items = $items->where("language_id", "=", request()->get("language_id"));
        }

        if (request()->has("has_captions") && request()->get("has_captions") != "") {
            $items = $items->where("has_captions", "=", request()->get("has_captions"));
        }

        if (request()->has("has_certificate") && request()->get("has_certificate") != "") {
            $items = $items->where("has_certificate", "=", request()->get("has_certificate"));
        }

        if (request()->has("length") && request()->get("length") != "") {
            $items = $items->where("length", "=", request()->get("length"));
        }

        if (request()->has("price") && request()->get("price") != "") {
            $items = $items->where("price", "=", request()->get("price"));
        }

        if (request()->has("price_in_dollar") && request()->get("price_in_dollar") != "") {
            $items = $items->where("price_in_dollar", "=", request()->get("price_in_dollar"));
        }

        if (request()->has("affiliate1_per") && request()->get("affiliate1_per") != "") {
            $items = $items->where("affiliate1_per", "=", request()->get("affiliate1_per"));
        }

        if (request()->has("affiliate2_per") && request()->get("affiliate2_per") != "") {
            $items = $items->where("affiliate2_per", "=", request()->get("affiliate2_per"));
        }

        if (request()->has("affiliate3_per") && request()->get("affiliate3_per") != "") {
            $items = $items->where("affiliate3_per", "=", request()->get("affiliate3_per"));
        }

        if (request()->has("affiliate4_per") && request()->get("affiliate4_per") != "") {
            $items = $items->where("affiliate4_per", "=", request()->get("affiliate4_per"));
        }

        if (request()->has("instructor_per") && request()->get("instructor_per") != "") {
            $items = $items->where("instructor_per", "=", request()->get("instructor_per"));
        }

        if (request()->has("discount_egp") && request()->get("discount_egp") != "") {
            $items = $items->where("discount_egp", "=", request()->get("discount_egp"));
        }

        if (request()->has("discount_usd") && request()->get("discount_usd") != "") {
            $items = $items->where("discount_usd", "=", request()->get("discount_usd"));
        }

        if (request()->has("featured") && request()->get("featured") != "") {
            $items = $items->where("featured", "=", request()->get("featured"));
        }

        if (request()->has("promo_video") && request()->get("promo_video") != "") {
            $items = $items->where("promo_video", "=", request()->get("promo_video"));
        }

        if (request()->has("visits") && request()->get("visits") != "") {
            $items = $items->where("visits", "=", request()->get("visits"));
        }

        if (request()->has("published") && request()->get("published") != "") {
            $items = $items->where("published", "=", request()->get("published"));
        }

        if (request()->has("position") && request()->get("position") != "") {
            $items = $items->where("position", "=", request()->get("position"));
        }

        if (request()->has("sort") && request()->get("sort") != "") {
            $items = $items->where("sort", "=", request()->get("sort"));
        }

        if (request()->has("doctor_name") && request()->get("doctor_name") != "") {
            $items = $items->where("doctor_name", "like", "%" . request()->get("doctor_name") . "%");
        }

        if (request()->has("full_access") && request()->get("full_access") != "") {
            $items = $items->where("full_access", "=", request()->get("full_access"));
        }

        if (request()->has("access_time") && request()->get("access_time") != "") {
            $items = $items->where("access_time", "=", request()->get("access_time"));
        }

        if (request()->has("soon") && request()->get("soon") != "") {
            $items = $items->where("soon", "=", request()->get("soon"));
        }

        if (request()->has("seo_desc") && request()->get("seo_desc") != "") {
            $items = $items->where("seo_desc", "like", "%" . request()->get("seo_desc") . "%");
        }

        if (request()->has("seo_keys") && request()->get("seo_keys") != "") {
            $items = $items->where("seo_keys", "like", "%" . request()->get("seo_keys") . "%");
        }

        if (request()->has("search_keys") && request()->get("search_keys") != "") {
            $items = $items->where("search_keys", "like", "%" . request()->get("search_keys") . "%");
        }

        $items = $items->paginate(env('PAGINATE'));
        return view('website.courses.index', compact('items'));
    }

    public function search($key=null){

        $courses = null;
        $listData = '';
        $searchKeys = getSearchKeys();

        if($key){
            $courses = Courses::where('published', 1)->where(function ($query) use($key) {
                $query->where("title", "like", "%" . $key . "%")
                    ->orWhere("search_keys", "like", "%" . $key . "%")
                    ->orWhere("doctor_name", "like", "%" . $key . "%")
                ;
            })->limit(10)->get();

            $listData .= '<div><a href="/allcourses/category?key=' . $key . '"><li><i class="fas fa-search"></i> ' . $key . '</li></a></div>';    

            foreach($courses as $course){
                $listData .= '<div><a href="/courses/view/' . $course->slug . '"><li>' . $course->title_lang . '</li></a></div>';
            }
    
        }else{
            if(isset($searchKeys) && count($searchKeys) > 0){
                $listData .= '<div class="recent-search">' . trans('home.recent search') . '</div>';
                foreach($searchKeys as $searchKey){
                    $listData .= '<div class="recent-search"><a class="w-100" href="/allcourses/category?key=' . $searchKey->word . '"><li>' . $searchKey->word . '</li></a><a href="javascript: void(0)"><i class="delete-search fas fa-times-circle" id="' . $searchKey->id .'"></i></a></div>';
                }
            }
        }

        return response()->json(['success'=>true, 'result'=>$listData], 200);
    }

    public function show($id = null)
    {
        return $this->createOrEdit('website.courses.edit', $id);
    }

    public function store(AddRequestCourses $request)
    {
        $item = $this->storeOrUpdate($request, null, true);
        return redirect('courses');
    }

    public function update($id, UpdateRequestCourses $request)
    {
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();

    }

    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('website.courses.show', $id, ['fields' => $fields]);
    }

    public function destroy($id)
    {
        return $this->deleteItem($id, 'courses')->with('sucess', 'Done Delete Courses From system');
    }

    public function page($slug)
    {


        $course = $this->model->where('slug', $slug)->firstOrFail();
        // $course->increment('visits');
        $course->visits = $course->visits + 1;
        $course->save();
        
        $this->data['enrolled'] = Courses::isEnrolledCourse($course->id);
        $this->data['wishListed'] = CourseWishlisted($course->id);
        $this->data['shoppingCart'] = Courses::inShoppingCart($course->id);
        $this->data['promoCode'] = true;
        $this->data['course'] = $course;
        $this->data['enrollment'] = null;
//        $eventStatus = getEventStatus($course);


        if($this->data['enrolled']) {
            $this->data['coursePercent'] = Progress::getLectureProgress(Auth::user()->id, $course->id);
        }
        if($this->data['enrolled'] && $course->type == Courses::TYPE_WEBINAR){
            if(Auth::check()){
                $this->data['enrollment'] = Courseenrollment::where('courses_id', $course->id)->where('user_id', Auth::user()->id)->first();
            }
        }

        $homeSettings = Homesettings::where('id', 1)->first();

        $exchangeRate = Payments::exchangeRate();
        $this->data['subscription_monthly'] = round($homeSettings->MonthlyB2cSubscriptionPrice);
        $this->data['subscription_yearly'] = round($homeSettings->subscription_yearly * $exchangeRate);
        $this->data['subscription_yearly_after'] = round($homeSettings->YearlyB2cSubscriptionPrice);
        $this->data['subscription_yearly_before'] = round(($homeSettings->MonthlyB2cSubscriptionPrice * 12));

        return view('website.courses.page', $this->data);
    }

    public function savewebinarcertificate($id){
        $course = Courses::findOrFail($id);

        if(isset($_POST['name'])){
            Courses::generateWebinarCertificate($course, $_POST['name']);
        }

        alert()->success(trans('courses.Successfuly Generated Certificate'));

        return redirect()->back();
    }

    public function enrollWebinar($id){

        $course = Courses::findOrFail($id);

        if(!Courses::isEnrolledCourse($course->id)){
            $enrollment = new Courseenrollment();
            $enrollment->courses_id = $id;
            $enrollment->user_id = Auth::user()->id;
            $enrollment->status = 1;
            $enrollment->start_time = date('Y-m-d');
            $enrollment->end_time = "2031-09-27";
            $enrollment->save();
        }

        alert()->success(trans('courses.Successfuly Enrolled To The Webinar'));

        return ($course->webinar_url) ? redirect()->to($course->webinar_url) : redirect()->back();

    }


    public function lecture($id)
    {


        $lecture = Courselectures::findOrFail($id);
        $enrolled = Courses::isEnrolledCourse($lecture->courses->id);

        if ((!$enrolled) and ($lecture->is_free == 0)) {
            abort('403', 'You don\'t have permission to access this page');
        }

        if (Auth::check()){
            $user = auth()->user();
            $user->last_lecture_id = $id;
            $user->save();
        }

        if($enrolled){
            $progress = Progress::where('user_id',Auth::user()->id)->where('courselectures_id',$id)->first();
            if(!$progress){
                //Save Progress
                $newProgress = new Progress();
                $newProgress->user_id = Auth::user()->id;
                $newProgress->courselectures_id = $id;
                $newProgress->courses_id = $lecture->courses_id;
                $newProgress->percentage = 1;
                $newProgress->save();
            }
            
            $this->data['coursePercent'] = Progress::getLectureProgress(Auth::user()->id,$lecture->courses_id) ;

            if($user->futurex){
                $data = array(
                    "courseId"=> $lecture->courses->futurexid,
                    "userId"=> $user->futurex['uid'],
                    "approxTotalCourseHrs"=> $lecture->courses->courselectures->sum('length') /60/60,
                    "overallProgress"=> ($this->data['coursePercent'] > 95 ) ? ($this->data['coursePercent'] - 5) : $this->data['coursePercent'],
                    "membershipState"=> "MEMBER",
//                    "passedAt"=>  ($this->data['coursePercent'] > 90 ) ? Carbon::instance(now())->toIso8601String() : '',
//                    "programId"=> "d2aVmqVIEeiAAwqXDFpUIA",
//                    "enrolledAt"=> 1563647032211,
                    "isCompleted"=> false
                );
                $postdata = json_encode($data);
                
                $future = new FutureXIntegration();
                $future->enrollmentProgress($postdata);
            }



            // Save Log
            $log = new Log();
            $log->model = "courselectures";
            $log->action = "view";
            $log->status = "Success";
            $log->user_id = Auth::user()->id;
            $log->model_id = $lecture->id;
            $log->courses_id = $lecture->courses->id;
            $log->type = Log::TYPE_USER;
            $log->save();

        }


        $this->data['lecture'] = $lecture;
        $this->data['next'] = Courselectures::where('id', '>', $lecture->id)->where('courses_id', $lecture->courses_id)->min('id');
        $this->data['previous'] = Courselectures::where('id', '<', $lecture->id)->where('courses_id', $lecture->courses_id)->max('id');
        $this->data['enrolled'] = $enrolled;
        $this->data['shoppingCart'] = Courses::inShoppingCart($lecture->courses->id);
        $this->data['promoCode'] = true;

        return view('website.courses.lectureNew', $this->data);
    }

    public function certificatesContainer($id) {

        $this->data['course'] = Courses::findOrFail($id);

        $this->data['allCertBought'] = true;

        $certificatescontainerAll = $this->data['course']->certificatescontainerWithCurrency;


            foreach ($certificatescontainerAll as $certificatescontainer) {
                if(!ModelCertificates::isBoughtCertificate($this->data['course']->id, $certificatescontainer->certificate->id)){
                    $this->data['allCertBought'] = false;
                    break;
                }

            }



        if(isset($_GET['course_id'])){
            dd('test');
        }

        return view('website.courses.assets.certificatesContainer', $this->data);

    }

    public function addCertsToCart(Request $request){

        
        if (!auth()->check()) {
            abort('404');
        }

        if(isset($_GET['Certificates'])){

            $params = array();
            
            parse_str($_GET['Certificates'], $params);

            $request = new Request($params);

            $course = Courses::findOrFail($request->all()['course_id']);

            if(isset($params['Certificates'])){

//                $order = Orders::where('user_id', Auth::user()->id)->where('status', Orders::STATUS_PENDING)->first();
                $order = getCurrentOrder();

                if (!$order) {
                    $order = new Orders();
                    $order->status = Orders::STATUS_PENDING;
                    $order->user_id = Auth::user()->id;
                }

                $order->currency = getCurrency();
                $order->save();

                $courseOrderPosition = Ordersposition::where('courses_id', $course->id)->where('orders_id', $order->id)->where('type', Ordersposition::TYPE_Course)->orderBy('id', 'DESC')->first();

                if (!$courseOrderPosition) {
                    //Save the item in the cart
                    $courseOrderPosition = new Ordersposition();
                    $courseOrderPosition->amount = $course->OriginalPrice;
                    $courseOrderPosition->quantity = 1;
                    $courseOrderPosition->unit_price = $course->OriginalPrice;
                    $courseOrderPosition->currency = getCurrency();
                    $courseOrderPosition->orders_id = $order->id;
                    $courseOrderPosition->courses_id = $course->id;
                    $courseOrderPosition->user_id = Auth::user()->id;
                    $courseOrderPosition->type = Ordersposition::TYPE_Course;
                    $courseOrderPosition->save();
                }
                
                foreach($params['Certificates'] as $certificate){

                    $certificateObj = ModelCertificates::findOrFail($certificate);
                    $orderPosition = Ordersposition::where('courses_id', $course->id)->where('orders_id', $order->id)->where('certificate_id', $certificate)->where('type', Ordersposition::TYPE_CERTIFICATE)->orderBy('id', 'DESC')->first();

                    if (!$orderPosition) {
                        //Save the item in the cart
                        $orderPosition = new Ordersposition();
                        $orderPosition->amount = $certificateObj->Price;
                        $orderPosition->quantity = 1;
                        $orderPosition->unit_price = $certificateObj->Price;
                        $orderPosition->currency = getCurrency();
                        $orderPosition->orders_id = $order->id;
                        $orderPosition->courses_id = $course->id;
                        $orderPosition->certificate_id = $certificateObj->id;
                        $orderPosition->user_id = Auth::user()->id;
                        $orderPosition->type = Ordersposition::TYPE_CERTIFICATE;
                        $orderPosition->save();
                    }
                }
        
                // To set Kiosk id Null
                $order->kiosk_id = null;
                $order->save();
        
                //Check if postaffiliatepro cookie exist to save affiliate id to the order

                // $postAffPro = new PostAffiliateProIntegration;
                // $order->aff_id = $postAffPro->getAffiliateId($request);

            $facebookConversionsApi = new FacebookConversionsAPI();
            $facebookConversionsApi->pushEvent(FacebookConversionsAPI::EVENT_ADDTOCART,$order);

                return response()->json(['success'=>true], 200);
            }else{
                return response()->json(['success'=>false], 200);
            }
            
        
        }else{

            return response()->json(['success'=>false], 200);
        }

               

    } 

    public function addcertificatescontainer(Request $request){


        if (!auth()->check()) {
            abort('404');
        }



        if(isset($_POST['Certificates'])){

            $params = $request->post();

//            parse_str($_POST['Certificates'], $params);
//            $request = new Request($params);

            $course = Courses::findOrFail($request->all()['course_id']);

            if(isset($params['Certificates'])){

//                $order = Orders::where('user_id', Auth::user()->id)->where('status', Orders::STATUS_PENDING)->first();
                $order = getCurrentOrder();

                if (!$order) {
                    $order = new Orders();
                    $order->status = Orders::STATUS_PENDING;
                    $order->user_id = Auth::user()->id;
                }

                $order->currency = getCurrency();
                $order->save();

                $courseOrderPosition = Ordersposition::where('courses_id', $course->id)->where('orders_id', $order->id)->where('type', Ordersposition::TYPE_Course)->orderBy('id', 'DESC')->first();

                if (!$courseOrderPosition) {
                    //Save the item in the cart
                    $courseOrderPosition = new Ordersposition();
                    $courseOrderPosition->amount = $course->OriginalPrice;
                    $courseOrderPosition->quantity = 1;
                    $courseOrderPosition->unit_price = $course->OriginalPrice;
                    $courseOrderPosition->currency = getCurrency();
                    $courseOrderPosition->orders_id = $order->id;
                    $courseOrderPosition->courses_id = $course->id;
                    $courseOrderPosition->user_id = Auth::user()->id;
                    $courseOrderPosition->type = Ordersposition::TYPE_Course;
                    $courseOrderPosition->save();
                }

                foreach($params['Certificates'] as $certificate){

                    $certificateObj = ModelCertificates::findOrFail($certificate);
                    $orderPosition = Ordersposition::where('courses_id', $course->id)->where('orders_id', $order->id)->where('certificate_id', $certificate)->where('type', Ordersposition::TYPE_CERTIFICATE)->orderBy('id', 'DESC')->first();

                    if (!$orderPosition) {
                        //Save the item in the cart
                        $orderPosition = new Ordersposition();
                        $orderPosition->amount = $certificateObj->Price;
                        $orderPosition->quantity = 1;
                        $orderPosition->unit_price = $certificateObj->Price;
                        $orderPosition->currency = getCurrency();
                        $orderPosition->orders_id = $order->id;
                        $orderPosition->courses_id = $course->id;
                        $orderPosition->certificate_id = $certificateObj->id;
                        $orderPosition->user_id = Auth::user()->id;
                        $orderPosition->type = Ordersposition::TYPE_CERTIFICATE;
                        $orderPosition->save();
                    }
                }

                // To set Kiosk id Null
                $order->kiosk_id = null;
                $order->save();

                //Check if postaffiliatepro cookie exist to save affiliate id to the order

                // $postAffPro = new PostAffiliateProIntegration;
                // $order->aff_id = $postAffPro->getAffiliateId($request);

            $facebookConversionsApi = new FacebookConversionsAPI();
            $facebookConversionsApi->pushEvent(FacebookConversionsAPI::EVENT_ADDTOCART,$order);

//                return response()->json(['success'=>true], 200);
                return redirect('cart');
            }else{

                return redirect()->back();
//                return response()->json(['success'=>false], 200);
            }


        }else{
            return redirect()->back();
//            return response()->json(['success'=>false], 200);
        }



    }

    public function ToggleFavourite($course_id)
    {

        $Wishlisted = CourseWishlisted($course_id);

        if ($Wishlisted) {
            $Wishlist = Coursewishlist::where('user_id', Auth::user()->id)->where('courses_id', $course_id)->delete();
            alert()->info(trans('website.Delete Course from favorite'), trans('website.Success'));
        } else {
            $Coursewishlist = Coursewishlist::create([
                'user_id' => Auth::user()->id,
                'courses_id' => $course_id,
            ]);
            alert()->success(trans('website.Add Course to favorite'), trans('website.Success'));
        }

        return redirect()->back();
    }

    public function ToggleFavouriteAjax($course_id)
    {


        $added = 0;
        $Wishlisted = CourseWishlisted($course_id);

        if ($Wishlisted) {
            $Wishlist = Coursewishlist::where('user_id', Auth::user()->id)->where('courses_id', $course_id)->delete();
            $added = 0;
        } else {
            $Coursewishlist = Coursewishlist::create([
                'user_id' => Auth::user()->id,
                'courses_id' => $course_id,
            ]);
            $added = 1;
        }


        return response()->json(['success'=>true, 'wishlist'=>$added, 'course_id' => $course_id], 200);


    }

    public function addToCart($course_id = null, Request $request)
    {
        // dd($request->cookie());

        if (!auth()->check()) {
            abort('404');
        }
       


        $course = Courses::findOrfail($course_id);

        //Check the existing of pending order for this user
//        $order = Orders::where('user_id', Auth::user()->id)->where('status', Orders::STATUS_PENDING)->orderBy('id', 'DESC')->first();;
        $order = getCurrentOrder();


        if (!$order) {
            $order = new Orders();
            $order->status = Orders::STATUS_PENDING;
            $order->user_id = Auth::user()->id;
        }

        $order->currency = getCurrency();
        $order->save();
        // Ceck if the order position found:
        $orderPosition = Ordersposition::where('courses_id', $course->id)->where('orders_id', $order->id)->where('type', '!=', Ordersposition::TYPE_DIRECT_PAY)->orderBy('id', 'DESC')->first();



        if (!$orderPosition) {
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
        }

        // To set Kiosk id Null
        $order->kiosk_id = null;

        //Check if postaffiliatepro cookie exist to save affiliate id to the order

        // $postAffPro = new PostAffiliateProIntegration;
        // $order->aff_id = $postAffPro->getAffiliateId($request);
        
        $order->save();
        
        $facebookConversionsApi = new FacebookConversionsAPI();
        $facebookConversionsApi->pushEvent(FacebookConversionsAPI::EVENT_ADDTOCART,$order);


        alert()->success(trans('website.Successfully added to cart'), trans('website.Success'));
        return redirect('/cart');
    }

    
    public function addToCartAjax($course_id){

        $course = Courses::findOrfail($course_id);

        $businessdata_id = Auth::user()->businessdata_id;

        $isBusinessProfileInComplete = 0;

        if($businessdata_id) {
            
            $isBusinessCourse = (count(Businesscourses::where('businessdata_id', $businessdata_id)->where('courses_id', $course_id)->get()) > 0) ? 1 : 0;

            if($isBusinessCourse) {

                $businessInputFields = Businessinputfields::where('businessdata_id', $businessdata_id)->get();

                if(count($businessInputFields) > 0) {
    
                    foreach($businessInputFields as $businessInputField) {
    
                        $response = Businessinputfieldsresponses::where('businessinputfields_id', $businessInputField->id)->where('user_id', Auth::user()->id)->get();
    
                        if(count($response) == 0) {
                            $isBusinessProfileInComplete = 1;
                        }
                    }
    
                }

            }

            
        }

        //Check the existing of pending order for this user
//        $order = Orders::where('user_id', Auth::user()->id)->where('status', Orders::STATUS_PENDING)->orderBy('id', 'DESC')->first();
        $order = getCurrentOrder();
        if (!$order) {
            $order = new Orders();
            $order->status = Orders::STATUS_PENDING;
            $order->user_id = Auth::user()->id;
            $order->save();
        }

        // Ceck if the order position found:
        $orderPosition = Ordersposition::where('courses_id', $course->id)->where('orders_id', $order->id)->orderBy('id', 'DESC')->first();

        if (!$orderPosition) {
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
        }

        // To set Kiosk id Null
        $order->kiosk_id = null;
        $order->save();

        $cart_count = count(getShoppingCart());


        return response()->json(['success'=>true, 'cart_count' => $cart_count, 'order' => $order, 'isBusinessProfileInComplete' => $isBusinessProfileInComplete], 200);

    }

    public function enrollNow($id){

        $course = Courses::findOrfail($id);
        $price = $course->OriginalPrice;
        $businessEndDate = false;

        if($price == 0){
            $freeOrder = new Orders();
            $freeOrder->status = Orders::STATUS_SUCCEEDED;
            $freeOrder->user_id = Auth::user()->id;
            $freeOrder->is_free = 1;


            $freeOrder->currency = getCurrency();

            if($freeOrder->save()){
                    //save the payement
                    $payment = new Payments();
                    $payment->operation = Payments::OPERATION_DEPOSIT;
                    $payment->amount = 0;
                    $payment->currency_id = "SAR";
                    $payment->user_id = Auth::user()->id;
                    $payment->receiver_id = 1;
                    $payment->status = Payments::STATUS_SUCCEEDED;
                    $payment->orders_id = $freeOrder->id;

                if($payment->save()){

                    //Save the item in the cart
                    $orderPosition = new Ordersposition();
                    $orderPosition->amount =  $price;
                    $orderPosition->quantity = 1;
                    $orderPosition->unit_price = $course->OriginalPrice;
                    $orderPosition->orders_id = $freeOrder->id;
                    $orderPosition->courses_id = $course->id;
                    $orderPosition->user_id = Auth::user()->id;
                    $orderPosition->type = Ordersposition::TYPE_Course;
                    $orderPosition->save();
                    $enrolled = Courses::isEnrolledCourse($course->id);

                    if (!$enrolled) {
                        $enroll = new Courseenrollment();
                        $enroll->user_id = Auth::user()->id;
                        $enroll->courses_id = $course->id;


                        //Check Subscription
                        if (Auth::user()->subscription) {
                            $enroll->subscriptionuser_id = Auth::user()->subscription['id'];
                            $businessEndDate = Auth::user()->subscription['end_date'];
                        }


                        //Check Business Data
//                        if (auth()->user()->businessdata_id) {
//                            $dateNow = date('Y-m-d H:i:s');
//                            $businessdata = Businessdata::where('status', 1)->whereDate('start_time', '<=', $dateNow)
//                            ->whereDate('end_time', '>=', $dateNow)->find(auth()->user()->businessdata_id);
//                            if ($businessdata) {
//                                // Check if Course in business
//                                $businessCourses = Businesscourses::where('courses_id', $course->id)->where('businessdata_id', $businessdata->id)->first();
//                                if ($businessCourses) {
//                                    $enroll->type = Courseenrollment::TYPE_B2B;
//                                    $enroll->businessdata_id = Auth::user()->businessdata_id;
//                                    if ($businessdata->discount_type == Businessdata::TYPE_PERCENTAGE AND $businessdata->discount_value == 100) {
//                                        $businessEndDate = $businessdata->end_time;
//                                    }
//                                }
//                            }
//                        }


                        //If Future X User
//                        if(Auth::user()->futurex){
//                            $dateTime = new \DateTime('now');
//                            $dateTime->setTimezone(new \DateTimeZone('UTC'));
//                            $utcTimestamp = $dateTime->getTimestamp();
//
//                            $data = array(
//                                "courseId"=> $course->futurexid,
//                                "userId"=> auth()->user()->futurex['uid'],
//                                "approxTotalCourseHrs"=> $course->courselectures->sum('length') /60/60,
//                                "overallProgress"=> 0,
//                                "membershipState"=> "MEMBER",
//        //                      "programId"=> "d2aVmqVIEeiAAwqXDFpUIA",
//                                "enrolledAt"=> $utcTimestamp,
//                                "isCompleted"=> false
//                            );
//                            $postdata = json_encode($data);
//                            $future = new FutureXIntegration();
//
//                            $enroll->type = Courseenrollment::TYPE_FUTUREX;
//                            $future->enrollmentProgress($postdata);
////                            dd($future);
//                        }



                        //End date
                        if ($course->full_access == Courses::FULL_TIME_ACCESS) {
                            $Addational_time = 3600;
                        } else {
                            $Addational_time = ($course->access_time ? $course->access_time : 3600);
                        }
                        $date = date('Y-m-d H:i:s');
                        $yesterday = date('Y-m-d H:i:s', strtotime($date . "-4 hours"));

                        $enroll->start_time = $yesterday;
                        $date = strtotime($date);

                        $date = strtotime("+" . $Addational_time . " day", $date);
                        $date = date('Y-m-d H:i:s', $date);
                        $enddate = date('Y-m-d H:i:s', strtotime($date . "+4 hours"));
                        $enroll->end_time = (isset($businessEndDate))?$businessEndDate:$enddate ;

                        $enroll->save();

                    }

                    //Caheck id this is abundle, we should also assign the included courses to the user:

                    if ($course->type == Courses::TYPE_BUNDLES) {

                        //Fetch the included Courses

                        foreach ($course->Courseincludes as $insideCourse) {
                            $enrolledInside = Courses::isEnrolledCourse($insideCourse->includedCourse->id);
                            if (!$enrolledInside) {
                                $enroll = new Courseenrollment();
                                $enroll->user_id = Auth::user()->id;
                                $enroll->courses_id = $insideCourse->includedCourse->id;

                                //End date
                                if ($course->full_access == Courses::FULL_TIME_ACCESS) {
                                    $Addational_time = 3600;
                                } else {
                                    $Addational_time = $course->access_time;
                                }
                                $date = date('Y-m-d H:i:s');
                                $yesterday = date('Y-m-d H:i:s', strtotime($date . "-4 hours"));

                                $enroll->start_time = $yesterday;
                                $date = strtotime($date);
                                $date = strtotime("+" . $Addational_time . " day", $date);
                                $date = date('Y-m-d H:i:s', $date);
                                $enddate = date('Y-m-d H:i:s', strtotime($date . "+4 hours"));
                                $enroll->end_time = $enddate;
                                $enroll->save();
                            }
                        }
                    }

                     alert()->success(trans('website.Thank you! Your request was successfully submitted!'), trans('website.Success'));

                // Send order email to the customer
                // Emails::instance()->sendOrderEmail($this->oAuthUser, $payment, $order);
//                Mail::to(Auth::user()->email)->send(new OrderConfirm($freeOrder,Auth::user(),getShoppingCartCost()));


                    if($course->courselectures[0]['id']){
                        return redirect("courses/courseLecture/id/". $course->courselectures[0]['id']);
                    }

                return redirect("/courses/view/". $course->slug);

                }


            }
        }
    }

    

    public function removeFromCart($id, $buy_now = 0)
    {

        $id = (int) $id;

        // Remove item position
        Courses::removeItemFromCart($id);

        if ($buy_now == 1) {
            return true;
        } else {
            alert()->info(trans('website.The course has been deleted from the cart'), trans('website.Success'));
            return redirect('/cart');
        }

    }

    public function removeFromCartAjax($id)
    {
        $id = (int) $id;

      
//        $order = Orders::where('user_id', Auth::user()->id)->where(function ($query) {
//            $query->where('status', Orders::STATUS_PENDING)
//                // ->orWhere('status', Orders::STATUS_VODAFONE)
//                // ->orWhere('status', Orders::STATUS_KIOSK)
//            ;
//        })->orderBy('id', 'DESC')->first();

        $order = getCurrentOrder();

        $orderPosition = Ordersposition::where('orders_id', $order->id)->where('courses_id', $id)->firstOrFail();
        
        if($orderPosition){
            $orderPosition->delete();
        }

        $cart_count = count(getShoppingCart());


        return response()->json(['success'=>true, 'cart_count'=>$cart_count], 200);


    }

    public function clearCart()
    {

        //check the current pending order and remove the related positions from the database:
//        $order = Orders::where('user_id', Auth::user()->id)->where('status', Orders::STATUS_PENDING)->orderBy('id', 'DESC')->first();

        $order = getCurrentOrder();

        if ($order) {
            $orderPosition = Ordersposition::where('orders_id', $order->id)->delete();
        }

        alert()->info(trans('website.The course has been deleted from the cart'), trans('website.Success'));
        return redirect('/cart');
    }

    public function allCourses($slug=null)
    {
        $this->data['type'] = null;
        $this->data['key'] = (request()->has('key') && request()->get('key') != "") ? request()->get('key') : null;
        $this->data['category'] = null;
         if($slug){
             $this->data['category'] = Categories::where('slug', $slug)->firstOrFail();
         }

        $this->data['slug'] = $slug;
        $this->data['mostViewedPerCategory'] = null;
        $this->data['tabsWidth'] = tabsContainerItemsWidth();
        $this->data['homesettings'] = Homesettings::find(1);
        
        return view('website.courses.allCourses', $this->data);
    }

    public function category($slug = null)
    {
        $this->data['type'] = Courses::TYPE_COURSE;
        $this->data['key'] = (request()->has('key') && request()->get('key') != "") ? request()->get('key') : null;
        $this->data['category'] = null;
        $this->data['slug'] = $slug;
        $this->data['mostViewedPerCategory'] = null;
        $this->data['tabsWidth'] = tabsContainerItemsWidth();
        $this->data['homesettings'] = Homesettings::find(1);

        return view('website.courses.category', $this->data);
    }

    public function mastersCategory($slug = null)
    {
        $this->data['type'] = Courses::TYPE_MASTERS;
        $this->data['key'] = (request()->has('key') && request()->get('key') != "") ? request()->get('key') : null;
        $this->data['category'] = null;
        $this->data['slug'] = $slug;
        $this->data['mostViewedPerCategory'] = null;
        $this->data['tabsWidth'] = tabsContainerItemsWidth();
        $this->data['homesettings'] = Homesettings::find(1);

        return view('website.masters.category', $this->data);
    }

    public function bundleCategory($slug = null)
    {
        $this->data['type'] = Courses::TYPE_BUNDLES;
        $this->data['key'] = (request()->has('key') && request()->get('key') != "") ? request()->get('key') : null;
        $this->data['category'] = null;
        $this->data['slug'] = $slug;
        $this->data['mostViewedPerCategory'] = null;
        $this->data['tabsWidth'] = tabsContainerItemsWidth();
        $this->data['homesettings'] = Homesettings::find(1);

        return view('website.bundles.category', $this->data);
    }

    public function diplomasCategory($slug = null)
    {
        $this->data['type'] = Courses::TYPE_DIPLOMAS;
        $this->data['key'] = (request()->has('key') && request()->get('key') != "") ? request()->get('key') : null;
        $this->data['category'] = null;
        $this->data['slug'] = $slug;
        $this->data['mostViewedPerCategory'] = null;
        $this->data['tabsWidth'] = tabsContainerItemsWidth();
        $this->data['homesettings'] = Homesettings::find(1);

        return view('website.diplomas.category', $this->data);
    }

    public function startExam($slug)
    {
        $course = $this->model->where('slug', $slug)->firstOrFail();
        $enrolled = Courses::isEnrolledCourse($course->id);
        if ((!$enrolled)) {
            abort('403', 'You don\'t have permission to access this page');
        }

        $exam = Quiz::where('type', 1)->where('courses_id', $course->id)->firstOrFail();
        

        /////////////////// studentExam ///////////////////
        $studentExam = Quizstudentsstatus::where('user_id',auth()->user()->id)->where('quiz_id',$exam->id)->orderBy('created_at', 'desc')->first();
        //////////////////////////////////////


        if ($studentExam && $studentExam->status == 4) {
            $studentExam = new Quizstudentsstatus();
            $studentExam->user_id = auth()->user()->id;
            $studentExam->quiz_id = $exam->id;
            $studentExam->start_time = time();
            $studentExam->status = 1;
            $studentExam->save();
        }




        if(isset($_POST['exam'])){
            if($_POST['exam'] != $exam->id){
                alert()->success(trans('website.There is an error'), trans('website.Error Message'));
                return redirect()->back();
            }

            //Save the student answers:
            foreach ($exam->quizquestions as $question) {
                $quistionName = "question".$question->id;
                if(isset($_POST[$quistionName])){
                    $questionSelcetedAnswer = (int)$_POST[$quistionName];

                    // 👇 هنا تضيف التحقق قبل إنشاء الإجابة:
                    $alreadyAnswered = Quizstudentsanswers::where('quizstudentsstatus_id', $studentExam->id)
                        ->where('quizquestions_id', $question->id)
                        ->exists();

                    if (!$alreadyAnswered) {
                        $quizAnswers = new Quizstudentsanswers();
                        $quizAnswers->user_id = auth()->user()->id;
                        $quizAnswers->quiz_id = $exam->id;
                        $quizAnswers->quizquestions_id = $question->id;
                        $quizAnswers->quizstudentsstatus_id = $studentExam->id;

                        if(is_int($questionSelcetedAnswer) && $questionSelcetedAnswer > 0){
                            $quizAnswers->quizquestionschoice_id = $questionSelcetedAnswer;
                            $quizAnswers->answered = 1;
                        } else {
                            $quizAnswers->quizquestionschoice_id = NULL;
                            $quizAnswers->answered = 0;
                            $quizAnswers->mark = 0;
                        }
                        $quizAnswers->save();

                        if($quizAnswers->quizquestionschoice->is_correct == 1){
                            $quizAnswers->is_correct = 1;
                            $quizAnswers->mark = $question->mark;
                            $quizAnswers->save();
                        }
                    }
                }
            }

            // Exam status to be done.

            if($studentExam){
                $studentExam->status = 4;
                $studentExam->end_time = time();

                // Pass or fail/////////////////////////////////////
                $quizTotalScore = $exam->quizSum;
            //                            $studentScore = $exam->currentStudentMark;
                $studentScore = Quiz::currentStudentMark($studentExam->id);
//                $percentage = round( (( $studentScore * 100 ) / $quizTotalScore),1 ) ;
                $percentage = min(round(($studentScore * 100) / $quizTotalScore, 1), 100);

                $examPassPercentage = $exam->pass_percentage;
                $studentExam->passed = ( $percentage >= $examPassPercentage) ? 1 : 0;
                $studentExam->save();

                //Generate Certificate
                if($studentExam->passed == 1){
                    // Commented to be generated after entering the user name to be orinted on the certificate
                //                        Courses::generateCertificate($exam->course);

                    // Send Notification Email about the exam pass:
                    //Check if the user have bought certificates or not

                    // if($certificatesArr){
                    //     Emails::instance()->examPassedEmail($this->oAuthUser, $certificatesArr);
                    // }

//                    $customerServiceAgents = User::where('group_id', 13)->get();
//                    foreach($customerServiceAgents as $agent){
//                        Mail::to($agent->email)->send(new ExamPassedEmail($studentExam->user, url('/lazyadmin/quizstudentsstatus/' . $studentExam->id . '/view'), $studentExam->quiz->courses));
//                    }
                    
                }
                return redirect("/courses/examResults/" . $slug);

            }

        }

        if($studentExam){
            // Exam time-out //////////////////////////
            $done = FALSE;

            if($studentExam->end_time == 0){
                $current = time();
                $start = $studentExam->start_time;

                $spentTime = $current - $start;
                $quizTime = $studentExam->quiz->time * 60;

                $done = ( ($quizTime - $spentTime) > 0 ) ? FALSE : TRUE;
            }

            if($done == TRUE){
                $studentExam->status = 4;
                $studentExam->end_time = time();

                // Pass or fail/////////////////////////////////////
                $quizTotalScore = $exam->quizSum;
                //                    $studentScore = $exam->currentStudentMark;
                $studentScore = $studentExam->CurrentStudentMark;

                $percentage = round( (( $studentScore * 100 ) / $quizTotalScore),1 ) ;
                $examPassPercentage = $exam->pass_percentage;
                $studentExam->passed = ( $percentage >= $examPassPercentage) ? 1 : 0;
                $studentExam->save();


                return redirect("/courses/examResults/" . $slug);
            }
            
            // Start New Exam if the admin anabled the student to retry again
            if($studentExam->exam_anytime == 1){

                $studentExam = new Quizstudentsstatus();
                $studentExam->user_id = auth()->user()->id;
                $studentExam->quiz_id = $exam->id;
                $studentExam->start_time = time();
                $studentExam->status = 1;
                $studentExam->save();
            }
            /////////////////////////////////////////////////////////////////////

            // if the student finishs this exam, display him/her the results:
            if($studentExam->status == 4){
                return redirect("/courses/examResults/" . $slug);
            }

        }else{
            $studentExam = new Quizstudentsstatus();
            $studentExam->user_id = auth()->user()->id;
            $studentExam->quiz_id = $exam->id;
            $studentExam->start_time = time();
            $studentExam->status = 1;
            $studentExam->save();
        }

        $this->data['model'] = $exam;
        $this->data['studentExam'] = $studentExam;

        return view('website.courses.exam', $this->data);
    
        
    }

    public function examResults($slug){


        $course = $this->model->where('slug', $slug)->firstOrFail();
        $enrolled = Courses::isEnrolledCourse($course->id);
        if ((!$enrolled)) {
            abort('403', 'You don\'t have permission to access this page');
        }

        $exam = Quiz::where('type', 1)->where('courses_id', $course->id)->firstOrFail();

        /////////////////// studentExamStatus ///////////////////
        $studentExam = Quizstudentsstatus::where('user_id',auth()->user()->id)->where('quiz_id',$exam->id)->orderBy('created_at', 'desc')->first();
        
        $alreadyPassed = Quizstudentsstatus::where('user_id',auth()->user()->id)->where('quiz_id',$exam->id)->where('passed', 1)->first();
        
        //////////////////////////////////////

        
        // Results
        $quizTotalScore = $exam->quizSum;

       

        // $studentScore = $exam->currentStudentMark( array( 'condition'=>'student_exam_instant_id=:studentExamInstantId', 'params'=>array( ':studentExamInstantId'=>$studentExam->id ) ) );
        $studentScore = Quiz::currentStudentMark($studentExam->id);
        $percentage = round( (( $studentScore * 100 ) / $quizTotalScore), 1);
        $examPassPercentage = $exam->pass_percentage;
        $isPassed = ( $percentage >= $examPassPercentage) ? 1 : 0;
        $totalQuestions = $exam->quizQuestionsCount;

        //$answeredQuestions = $exam->currentStudentAnswerdQuestionsCount( array( 'condition'=>'student_exam_instant_id=:studentExamInstantId', 'params'=>array( ':studentExamInstantId'=>$studentExam->id ) ) );
        $answeredQuestions = $studentExam->studentAnswerdQuestionsCount;
        $CorrectansweredQuestions = $studentExam->studentAnswerdCorrectQuestionsCount;


        $certificate = null;
        

        if($isPassed == 1 || $alreadyPassed){

            $certificate = $studentExam->certificate;
            if(!$certificate && Auth::user()->futurex){
                $certificate = Quizstudentsstatus::generateCertificate($exam->courses,Auth::user()->futurex['englishFullName'],$studentExam->id);
            }elseif(!$certificate && isset($_POST['name'])){
                $certificate = Quizstudentsstatus::generateCertificate($exam->courses, $_POST['name'],$studentExam->id);
            }

        }else{

            $canRetestAfter = $studentExam->start_time + 14*24*60*60;
            // if the now is 2 weeks ago from the last failure. then you can test again
            if( time() > $canRetestAfter){
                $studentExam = new QuizStudentsStatus();
                $studentExam->user_id = auth()->user()->id;
                $studentExam->quiz_id = $exam->id;
                $studentExam->start_time = time();
                $studentExam->status = 1;

                $studentExam->save();
                return redirect("/courses/startExam/" . $slug);
            }
        }

        // Check in this action that the failed user can start the exam again in these time or not.
        //
        //
        ///////////////////////////////////////////////////////

        $this->data['exam'] = $exam;
        $this->data['isPassed'] = $isPassed;
        $this->data['totalQuestions'] = $totalQuestions;
        $this->data['answeredQuestions'] = $answeredQuestions;
        $this->data['correctansweredQuestions'] = $CorrectansweredQuestions;
        $this->data['studentExam'] = $studentExam;
        $this->data['slug'] = $slug;
        $this->data['percentage'] = $percentage;
        $this->data['examPassPercentage'] = $examPassPercentage;
        $this->data['certificate'] = $certificate;

        return view('website.courses.examResults', $this->data);



    



    }

    public function test(){

        // $this->data['order'] = Orders::find(636194);
        // $this->data['user'] = User::find(20);
        // $this->data['amount'] = 120;
        
        // $facebookConversionsApi = new FacebookConversionsAPI();
        // $facebookConversionsApi->pushEvent('Purchase', $this->data['order']);

        //return view('website.courses.OrderConfirm', $this->data);
    }

    public function sectionQuiz($sectionQuizID){

        $exam = Sectionquiz::findOrFail($sectionQuizID);
        $enrolled = Courses::isEnrolledCourse($exam->courses->id);
        if ((!$enrolled)) {
            abort('403', 'You don\'t have permission to access this page');
        }

        /////////////////// studentExam ///////////////////
        $studentExam = Sectionquizstudentstatus::where('user_id',auth()->user()->id)->where('sectionquiz_id',$sectionQuizID)->orderBy('created_at', 'desc')->first();
        //////////////////////////////////////

        if(isset($_POST['exam'])){

            //Save the student answers:
            foreach ($exam->sectionquizquestions as $question) {
                $quistionName = "question".$question->id;
                //
                if(isset($_POST[$quistionName])){



                    $questionSelcetedAnswer = (int)$_POST[$quistionName];
                    //   var_dump($questionSelcetedAnswer);die;
                    $quizAnswers = new Sectionquizstudentanswer();
                    $quizAnswers->user_id = auth()->user()->id;
                    $quizAnswers->sectionquiz_id = $exam->id;
                    $quizAnswers->sectionquizquestions_id = $question->id;
                    $quizAnswers->sectionquizstudentstatus_id = $studentExam->id;

                    if(is_int($questionSelcetedAnswer) && $questionSelcetedAnswer > 0){
                        $quizAnswers->sectionquizchoise_id = $questionSelcetedAnswer;
                        $quizAnswers->answered = 1;
                    }else{
                        $quizAnswers->sectionquizchoise_id = NULL;
                        $quizAnswers->answered = 0;
                        $quizAnswers->mark = 0;
                    }

                    $quizAnswers->save();

                    //Check if the answer is correct or not:
                    if($quizAnswers->sectionquizchoise->is_correct == 1){
                        $quizAnswers->is_correct = 1;
                        $quizAnswers->mark = $question->mark;
                        $quizAnswers->save();
                    }else{
                        $quizAnswers->is_correct = 0;
                        $quizAnswers->mark = 0;
                        $quizAnswers->save();
                    }

                }else{
                    //                        die("out");
                }
            }
            // Exam status to be done.

            if($studentExam){
                $studentExam->status = 4;
                $studentExam->end_time = time();

                // Pass or fail/////////////////////////////////////
                $quizTotalScore = $exam->quizSum;
                // $studentScore = $exam->currentStudentMark;
                $studentScore = Sectionquiz::currentStudentMark($studentExam->id);
                $percentage = round( (( $studentScore * 100 ) / $quizTotalScore),1 ) ;

                $examPassPercentage = $exam->pass_percentage;
                $studentExam->passed = ( $percentage >= $examPassPercentage) ? 1 : 0;
                $studentExam->save();


                return redirect("/courses/sectionQuiz/id/" . $sectionQuizID);

            }




        }

        if($studentExam){
            // if the student finishs this exam, display him/her the results:
            if($studentExam->status == 4){
                $alreadyPassed = Sectionquizstudentstatus::where('user_id',auth()->user()->id)->where('sectionquiz_id',$exam->id)->where('passed', 1)->first();
                // Results
                $quizTotalScore = $exam->quizSum;



                // $studentScore = $exam->currentStudentMark( array( 'condition'=>'student_exam_instant_id=:studentExamInstantId', 'params'=>array( ':studentExamInstantId'=>$studentExam->id ) ) );
                $studentScore = Sectionquiz::currentStudentMark($studentExam->id);
                $percentage = round( (( $studentScore * 100 ) / $quizTotalScore), 1);
                $examPassPercentage = $exam->pass_percentage;
                $isPassed = ( $percentage >= $examPassPercentage) ? 1 : 0;
                $totalQuestions = $exam->quizQuestionsCount;

                //$answeredQuestions = $exam->currentStudentAnswerdQuestionsCount( array( 'condition'=>'student_exam_instant_id=:studentExamInstantId', 'params'=>array( ':studentExamInstantId'=>$studentExam->id ) ) );
                $answeredQuestions = $studentExam->studentAnswerdQuestionsCount;
                $CorrectansweredQuestions = $studentExam->studentAnswerdCorrectQuestionsCount;


                $this->data['isPassed'] = $isPassed;
                $this->data['totalQuestions'] = $totalQuestions;
                $this->data['answeredQuestions'] = $answeredQuestions;
                $this->data['correctansweredQuestions'] = $CorrectansweredQuestions;
                $this->data['studentExam'] = $studentExam;
                $this->data['percentage'] = $percentage;
                $this->data['examPassPercentage'] = $examPassPercentage;

            }

        }else{
            $studentExam = new Sectionquizstudentstatus();
            $studentExam->user_id = auth()->user()->id;
            $studentExam->sectionquiz_id = $sectionQuizID;
            $studentExam->start_time = time();
            $studentExam->status = 1;
            $studentExam->save();
        }

        $this->data['model'] = $exam;
        $this->data['enrolled'] = $enrolled;
        $this->data['coursePercent'] = Progress::getLectureProgress(Auth::user()->id,$exam->courses_id) ;
        $this->data['studentExam'] = $studentExam;

        return view('website.courses.sectionQuiz', $this->data);

    }



    public function enrollFuturex($id){
        $course = Courses::findOrfail($id);

        $price = $course->OriginalPrice;
        //If Future X User
        if(Auth::user()->futurex) {
            if ($price == 0) {
                $freeOrder = new Orders();
                $freeOrder->status = Orders::STATUS_SUCCEEDED;
                $freeOrder->user_id = Auth::user()->id;
                $freeOrder->is_free = 1;

                $freeOrder->currency = getCurrency();

                if ($freeOrder->save()) {
                    //save the payement
                    $payment = new Payments();
                    $payment->operation = Payments::OPERATION_DEPOSIT;
                    $payment->amount = 0;
                    $payment->currency_id = "EGP";
                    $payment->user_id = Auth::user()->id;
                    $payment->receiver_id = 1;
                    $payment->status = Payments::STATUS_SUCCEEDED;
                    $payment->orders_id = $freeOrder->id;

                    if ($payment->save()) {

                        //Save the item in the cart
                        $orderPosition = new Ordersposition();
                        $orderPosition->amount = $price;
                        $orderPosition->quantity = 1;
                        $orderPosition->unit_price = $course->OriginalPrice;
                        $orderPosition->orders_id = $freeOrder->id;
                        $orderPosition->courses_id = $course->id;
                        $orderPosition->user_id = Auth::user()->id;
                        $orderPosition->type = Ordersposition::TYPE_Course;
                        $orderPosition->save();
                        $enrolled = Courses::isEnrolledCourse($course->id);
                        if (!$enrolled) {
                            $enroll = new Courseenrollment();
                            $enroll->user_id = Auth::user()->id;
                            $enroll->courses_id = $course->id;


                            $dateTime = new \DateTime('now');
                            $dateTime->setTimezone(new \DateTimeZone('UTC'));
                            $utcTimestamp = $dateTime->getTimestamp();

                            $data = array(
                                "courseId" => $course->futurexid,
                                "userId" => auth()->user()->futurex['uid'],
                                "approxTotalCourseHrs" => $course->courselectures->sum('length') / 60 / 60,
                                "overallProgress" => 0,
                                "membershipState" => "MEMBER",
                                //                      "programId"=> "d2aVmqVIEeiAAwqXDFpUIA",
                                "enrolledAt" => $utcTimestamp,
                                "isCompleted" => false
                            );
                            $postdata = json_encode($data);
                            $future = new FutureXIntegration();

                            $enroll->type = Courseenrollment::TYPE_FUTUREX;
                            $future->enrollmentProgress($postdata);

                            //End date
                            if ($course->full_access == Courses::FULL_TIME_ACCESS) {
                                $Addational_time = 3600;
                            } else {
                                $Addational_time = ($course->access_time ? $course->access_time : 3600);
                            }
                            $date = date('Y-m-d H:i:s');
                            $yesterday = date('Y-m-d H:i:s', strtotime($date . "-4 hours"));

                            $enroll->start_time = $yesterday;
                            $date = strtotime($date);

                            $date = strtotime("+" . $Addational_time . " day", $date);
                            $date = date('Y-m-d H:i:s', $date);
                            $enddate = date('Y-m-d H:i:s', strtotime($date . "+4 hours"));
                            $enroll->end_time = (isset($businessEndDate)) ? $businessEndDate : $enddate;


                            $enroll->save();
                            alert()->success(trans('website.Thank you! Your request was successfully submitted!'), trans('website.Success'));
                        }

                        //Caheck id this is abundle, we should also assign the included courses to the user:




                        // Send order email to the customer
                        // Emails::instance()->sendOrderEmail($this->oAuthUser, $payment, $order);
//                Mail::to(Auth::user()->email)->send(new OrderConfirm($freeOrder,Auth::user(),getShoppingCartCost()));

                        $lecture = $course->courselectures->first();
                        if($lecture){
                            return redirect("/courses/courseLecture/id/" . $lecture->id);
                        }

                        return redirect("/courses/view/" . $course->slug);

                    }


                }
            }
        }
    }



}
