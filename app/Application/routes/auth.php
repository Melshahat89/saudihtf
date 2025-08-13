<?php

use App\Application\Controllers\Website\AccountController;
use App\Application\Controllers\Website\ConsultationsController;
use App\Application\Controllers\Website\CoursesController;
use App\Application\Controllers\Website\CoursesnotesController;
use App\Application\Controllers\Website\EventsController;
use App\Application\Controllers\Website\HomeController;
use App\Application\Controllers\Website\LecturequestionsanswersController;
use App\Application\Controllers\Website\LecturequestionsController;
use App\Application\Controllers\Website\PaymentsController;
use App\Application\Controllers\Website\QuizstudentsstatusController;
use App\Application\Controllers\Website\UsertargetsController;
use Illuminate\Support\Facades\Route;

########## HomeController ##########
Route::get('deleteFile/{model}/{id}', [HomeController::class, 'deleteImage']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/site/cartPayments', [HomeController::class, 'cartPayments']);
Route::get('/site/cartFinish', [HomeController::class, 'cartFinish']);
Route::get('/site/cartFinishVodafone', [HomeController::class, 'cartFinishVodafone']);
Route::get('/site/cartFinishKiosk/{type}', [HomeController::class, 'cartFinishKiosk']);
Route::any('/site/cartFinishMobileWallet', [HomeController::class, 'cartFinishMobileWallet']);
Route::get('/site/cartFinishFawry', [HomeController::class, 'cartFinishFawry']);
Route::post('/site/insertCoupon', [HomeController::class, 'insertCoupon']);
Route::get('/removePromo', [HomeController::class, 'removePromo']);
Route::get('/site/cartFinishDirect', [HomeController::class, 'cartFinishDirect']);
Route::get('/site/cartFinishFawryDirect', [HomeController::class, 'cartFinishFawryDirect']);
Route::get('/site/cartFinishKioskDirect/{type}', [HomeController::class, 'cartFinishKioskDirect']);
Route::get('/site/cartFinishVodafoneDirect', [HomeController::class, 'cartFinishVodafoneDirect']);
Route::any('/site/cartFinishMobileWalletDirect', [HomeController::class, 'cartFinishMobileWalletDirect']);
Route::get('/site/insertCouponAjax', [HomeController::class, 'insertCouponAjax']);
Route::get('/site/payments', [HomeController::class, 'payments']);
Route::get('/site/cartFinishPaypal/{id?}', [HomeController::class, 'paypal']);
Route::get('/site/cartFinishPaypalConsultation', [HomeController::class, 'paypalConsultation']);
Route::get('/removePromoAjax', [HomeController::class, 'removePromoAjax']);
Route::get('/site/hasWallet/{id}', [HomeController::class, 'actionHasWallet']);
Route::get('/site/ajaxPayVisa/{orderID?}', [HomeController::class, 'ajaxPayVisa']);
Route::get('/site/ajaxPayVisaConsultation', [HomeController::class, 'ajaxPayVisaConsultation']);

########## CoursesController ##########
Route::get('/courses/toggleFavourite/id/{id}', [CoursesController::class, 'ToggleFavourite']);
Route::get('/courses/toggleFavouriteAjax/id/{id}', [CoursesController::class, 'ToggleFavouriteAjax']);
Route::get('/courses/addToCart/id/{id?}', [CoursesController::class, 'addToCart']);
Route::get('/events/addEventToCart/{id}', [CoursesController::class, 'ddEventToCart']);
Route::get('/courses/addToCartAjax/id/{id}', [CoursesController::class, 'addToCartAjax']);
Route::get('/courses/removeFromCartAjax/id/{id}', [CoursesController::class, 'removeFromCartAjax']);
Route::get('/courses/enrollNow/id/{id}', [CoursesController::class, 'enrollNow']);
Route::get('/courses/removeFromCart/id/{id}', [CoursesController::class, 'removeFromCart']);
Route::get('/courses/clearCart', [CoursesController::class, 'clearCart']);
Route::get('/addcerttocart', [CoursesController::class, 'addCertsToCart']);
Route::post('/addcertificatescontainer', [CoursesController::class, 'addcertificatescontainer']);
Route::any('courses/startExam/{slug}' , [CoursesController::class, 'startExam']);
Route::any('courses/examResults/{slug}' , [CoursesController::class, 'examResults']);
Route::any('courses/certificatesContainer/id/{id}', [CoursesController::class, 'certificatesContainer']);
Route::get('/site/enrollWebinar/{id}', [CoursesController::class, 'enrollWebinar']);
Route::post('savewebinarcertificate/{id}', [CoursesController::class, 'saveWebinarCertificate']);

Route::any('courses/sectionQuiz/id/{id}', [CoursesController::class, 'sectionQuiz']);

########## EventsController ##########
Route::get('/events/enrollEventNow/{id}', [EventsController::class, 'enrollEventNow']);

########## PaymentsController ##########
Route::get('/payments/acceptConfirmation2', [PaymentsController::class, 'acceptConfirmation2']);
Route::get('/payments/aed-acceptConfirmation2', [PaymentsController::class, 'aed_acceptConfirmation2']);

Route::get('/payments/paypalconfirmation/{id?}', [PaymentsController::class, 'paypalconfirmation']);

########## LecturequestionsanswersController ##########
Route::post('lecturequestionsanswers/item' , [LecturequestionsanswersController::class, 'store']);
Route::get('lecturequestionsanswers/item/{id?}' , [LecturequestionsanswersController::class, 'show']);
Route::any('lecturequestionsanswersajax/item' , [LecturequestionsanswersController::class, 'storeAjax']);

########## LecturequestionsController ##########
Route::get('lecturequestions/item/{id?}' , [LecturequestionsController::class, 'show']);
Route::post('lecturequestions/item' , [LecturequestionsController::class, 'store']);
Route::any('lecturequestionsajax/item' , [LecturequestionsController::class, 'storeAjax']);

########## AccountController ##########

Route::prefix('account')->group(function () {
    Route::get('edit', [AccountController::class, 'edit']);
    Route::post('update/{id}', [AccountController::class, 'update']);
    Route::post('delete/{id}', [AccountController::class, 'delete']);
    Route::get('analysis', [AccountController::class, 'analysis']);
    Route::get('myCourses', [AccountController::class, 'myCourses']);
    Route::get('myFavourites', [AccountController::class, 'myFavourites']);
    Route::get('myCertificates', [AccountController::class, 'myCertificates']);
    Route::get('myProgress', [AccountController::class, 'myProgress']);
    Route::get('clearAllFavourites', [AccountController::class, 'clearAllFavourites']);
    Route::get('complete', [AccountController::class, 'complete']);
    Route::any('otp', [AccountController::class, 'otp']);
    Route::get('sendOtp', [AccountController::class, 'sendOtp']);
    Route::get('mySubscriptions', [AccountController::class, 'mySubscription']);
});



########## QuizstudentsstatusController ##########
Route::any('quiz/answers/{id}', [QuizstudentsstatusController::class, 'answers']);

######### Consultations Controller ###############
Route::post('consultations/{id}/availability', [ConsultationsController::class, 'availability']);
Route::get('/account/consultantanalysis', [AccountController::class, 'consultantAnalysis']);

#### coursereviews control
Route::get('coursereviews' , 'CoursereviewsController@index');
Route::get('coursereviews/item/{id?}' , 'CoursereviewsController@show');
Route::post('coursereviews/item' , 'CoursereviewsController@store');
Route::post('coursereviews/item/{id}' , 'CoursereviewsController@update');
Route::get('coursereviews/{id}/delete' , 'CoursereviewsController@destroy');
Route::get('coursereviews/{id}/view' , 'CoursereviewsController@getById');


#### consultationsreviews control
Route::get('consultationsreviews' , 'ConsultationsreviewsController@index');
Route::get('consultationsreviews/item/{id?}' , 'ConsultationsreviewsController@show');
Route::post('consultationsreviews/item' , 'ConsultationsreviewsController@store');
Route::post('consultationsreviews/item/{id}' , 'ConsultationsreviewsController@update');
Route::get('consultationsreviews/{id}/delete' , 'ConsultationsreviewsController@destroy');
Route::get('consultationsreviews/{id}/view' , 'ConsultationsreviewsController@getById');

#### Coursesnotes control
Route::post('coursesnotes/item' , [CoursesnotesController::class, 'store']);
Route::get('coursesnotes/item/{id}' , [CoursesnotesController::class, 'show']);
Route::post('coursesnotes/item/{id}' , [CoursesnotesController::class, 'update']);
Route::get('coursesnotes/{id}/delete' , [CoursesnotesController::class, 'destroy']);

#### Usertargets control
Route::post('usertargets/item' , [UsertargetsController::class, 'store']);
Route::get('usertargets/item/{id}' , [UsertargetsController::class, 'show']);
Route::post('usertargets/item/{id}' , [UsertargetsController::class, 'update']);
Route::get('usertargets/{id}/delete' , [UsertargetsController::class, 'destroy']);

########## TalksreviewsController - OUTDATED ##########
// Route::post('talksreviews/item' , 'TalksreviewsController@store');

########## EventsreviewsController - OUTDATED ##########s
// Route::post('eventsreviews/item' , 'EventsreviewsController@store');

########## MasterrequestController - OUTDATED ##########
// Route::post('masterrequest/item' , 'MasterrequestController@store');
// Route::get('masterrequest/item/{id?}' , 'MasterrequestController@show');
// Route::get('masterrequest/{id}/view' , 'MasterrequestController@getById');
// Route::post('masterrequest/item/{id}' , 'MasterrequestController@update');

########## TalksController - OUTDATED ##########
// Route::get('talks/like/{talkID}/{status}', 'TalksController@like');
// Route::get('talks/likeAjax/{talkID}/{status}', 'TalksController@likeAjax');


Route::post('site/b2bPayVisa', 'HomeController@b2bPayVisa');

Route::any('pay/{method}', 'HomeController@payBy');

Route::any('business/newLicense' , 'BusinessdataController@newLicense');
Route::get('business/subscribePayment/{noLicense}/{type}' , 'BusinessdataController@subscribePayment');
Route::any('business/extendSubscriptions' , 'BusinessdataController@extendSubscriptions');
Route::get('business/extendSubscriptionsPayment/{noLicense}/{type}' , 'BusinessdataController@extendSubscriptionsPayment');
Route::get('business/mygroup' , 'BusinessdataController@mygroup');
Route::get('business/group-user-activity/{id}' , 'BusinessdataController@groupUserActivity');


Route::post('businessinvitation/{token}/accept', 'BusinessInvitationController@accept');
Route::get('sendreport', 'BusinessdataController@sendReportViaEmail');

Route::get('/subscriptions/subscripeNow/{type}', [HomeController::class, 'subscripeNow']);
//Route::any('spin', 'HomeController@spin');

Route::get('/enrollFuturex/{courseId}', [CoursesController::class, 'enrollFuturex']);


Route::get('/payments/verify/{payment?}',[HomeController::class,'payment_verify'])->name('verify-payment');

Route::get('/site/ajaxPayHyperpay/{orderID?}/{source?}', [HomeController::class, 'ajaxPayHyperpay']);