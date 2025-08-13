<?php

use App\Application\Controllers\Website\Auth\ForgotPasswordController;
use App\Application\Controllers\Website\CareersController;
use App\Application\Controllers\Website\ConsultationsController;
use App\Application\Controllers\Website\ContactController;
use App\Application\Controllers\Website\CoursesController;
use App\Application\Controllers\Website\EventsController;
use App\Application\Controllers\Website\HomeController;
use App\Application\Controllers\Website\PageController;
use App\Application\Controllers\Website\SocialController;
use App\Application\Controllers\Website\TalksController;
use App\Application\Controllers\Website\TestimonialsController;
use App\Application\Controllers\Website\UserController;
use Illuminate\Support\Facades\Route;

########## HomeController ##########
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('joinAsInstructor', [HomeController::class, 'joinAsInstructor']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/ourteam', [HomeController::class, 'ourteam']);
Route::get('instructors/view/{slug}' , [HomeController::class, 'instructor']);
Route::get('instructors/courses/{slug}' , [HomeController::class, 'instructor']);
Route::get('instructors/All' , [HomeController::class, 'AllInstructors']);
Route::get('partners/all' , [HomeController::class, 'AllPartners']);
Route::get('partners/view/{slug}' , [HomeController::class, 'partner']);
Route::any('verifycertificate', [HomeController::class, 'verifyCertificate']);
Route::any('directpay', [HomeController::class, 'directPay']);
Route::get('directpay/{id}', [HomeController::class, 'directPay2']);
Route::get('site/country/{id}', [HomeController::class, 'getCountry']);

########## ContactController ##########
Route::get('contact' , [ContactController::class, 'index']);
Route::post('contact' , [ContactController::class, 'storeContact']);

########## PageController ##########
Route::get('page' , [PageController::class, 'index']);
Route::get('page/{id}/view' , [PageController::class, 'getById']);
Route::get('page/{slug}' , [PageController::class, 'getBySlug']);

########## CareersController ##########
Route::get('careers' , [CareersController::class, 'index']);

######### CoursesController #########
Route::get('courses/view/{slug}' , [CoursesController::class, 'page']);
Route::get('courses/courseLecture/id/{id}', [CoursesController::class, 'lecture']);
Route::get('courses/category/{slug?}', [CoursesController::class, 'category']);
Route::get('bundles/category/{slug?}', [CoursesController::class, 'bundleCategory']);
Route::get('professional-certificates/category/{slug?}', [CoursesController::class, 'professionalcertificatesCategory']);
Route::get('masters/category/{slug?}', [CoursesController::class, 'mastersCategory']);
Route::get('diplomas/category/{slug?}', [CoursesController::class, 'diplomasCategory']);
Route::get('allcourses/category/{slug?}', [CoursesController::class, 'allCourses']);
Route::get('/courses/search/{key?}', [CoursesController::class, 'search']);

######### TalksController #########
Route::get('talks/view/{slug}', [TalksController::class, 'page']);
Route::get('talks/category', [TalksController::class, 'category']);

######### EventsController #########
Route::get('events/view/{id}', [EventsController::class, 'page']);
Route::get('events/confirmation/{id}', [EventsController::class, 'confirm']);
Route::get('events/category/{slug?}', [EventsController::class, 'category']);

######### SocialController #########
Route::get('social/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('social/callback/{service}', [SocialController::class, 'callback']);
Route::get('social/mobileCallback/{service}', [SocialController::class, 'mobileCallback']);

######### UserController #########
Route::get('user/verify/{token}/{redirectUrl}' , [UserController::class, 'verifyUser']);  

######### Custom Password Reset #########
Route::get('password/reset', [ForgotPasswordController::class, 'showForgetPasswordForm']);
Route::post('password/email', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('password.email');
Route::post('password/resettoken', [ForgotPasswordController::class, 'submitValidateTokenForm'])->name('password.token');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password.submit');



######### Partnership - OUTDATED #########
// Route::get('partnership/index' , 'HomeController@landing');
// Route::get('partnership' , 'HomeController@landing');
// Route::get('partnership/thankyou' , 'HomeController@thankyou');
// Route::get('partnership/register-individual' , 'PartnershipController@register_individual');
// Route::post('partnership/register-individual' , 'Auth\RegisterController@register_individual');
// Route::get('partnership/register-institution' , 'PartnershipController@register_institution');
// Route::post('partnership/register-institution' , 'Auth\RegisterController@register_institution');

######### Business - OUTDATED #########
//Route::get('business/index' , 'HomeController@business');
//Route::get('business' , 'HomeController@business');


//Route::get('business/offer-price' , 'HomeController@offerPrice');
//Route::get('business/offline-training' , 'HomeController@offlineTraining');
//Route::get('business/subscriptions-service' , 'HomeController@subscriptionsService');
//Route::get('business/digital-transformation' , 'HomeController@digitalTransformation');
//Route::get('business/professional-certificates' , 'HomeController@professionalCertificates');
//Route::get('business/contact-us' , 'HomeController@contactus');
//
//




// Route::get('business/businessCourses' , 'HomeController@businessCourses');
//// Route::post('businessLogin' , 'Auth\LoginController@businessLogin');
//// Route::post('businessinputfieldsresponses', 'BusinessdataController@storeBusinessinputfieldsresponses');
//
//Route::post('businessinputfieldsresponses', 'BusinessdataController@storeBusinessinputfieldsresponses');
//Route::get('businessinvitation/token/{token}', 'BusinessInvitationController@invitation');


########### Consultation ###########
//Route::get('consultations', [HomeController::class, 'consultation']);
//Route::get('/consultants/category', [ConsultationsController::class, 'category']);
//Route::get('/consultants/view/{slug}', [ConsultationsController::class, 'page']);

########### Mobile App ###############
Route::get('mobile-app', [HomeController::class, 'mobileApp']);
Route::get('test', [HomeController::class, 'test']);

Route::get('consultant/view/{slug}' , [ConsultationsController::class, 'profile']);
Route::get('testimonials' , [TestimonialsController::class, 'all']);

#### blog control
Route::get('blog/tag/{slug}' , 'BlogController@blog')->name('tag');
Route::get('blog/category/{slug}' , 'BlogController@blog')->name('category');
Route::get('blog', 'BlogController@blog')->name('index');
Route::get('blog/{category}/{post}' , 'BlogController@post')->name('post');


########### Subscriptions ###############
Route::get('subscriptions', [HomeController::class, 'index']);



Route::get('addData', 'HomeController@addData');
Route::get('addDataInstructor', 'HomeController@addDataInstructor');






//
//Route::middleware(config('saml2_settings.routesMiddleware'))
//    ->prefix(config('saml2_settings.routesPrefix').'/')->group(function() {
//        Route::prefix('{idp}')->group(function() {
//            $saml2_controller = config('saml2_settings.saml2_controller', 'Aacotroneo\Saml2\Http\Controllers\Saml2Controller');
//
//            Route::get('/logout', array(
//                'as' => 'saml2_logout',
//                'uses' => $saml2_controller.'@logout',
//            ));
//
//            Route::get('/login', array(
//                'as' => 'saml2_login',
//                'uses' => $saml2_controller.'@login',
//            ));
//
//            Route::get('/metadata', array(
//                'as' => 'saml2_metadata',
//                'uses' => $saml2_controller.'@metadata',
//            ));
//
//            Route::any('/acs', array(
//                'as' => 'saml2_acs',
//                'uses' => $saml2_controller.'@acs',
//            ));
//
//            Route::get('/sls', array(
//                'as' => 'saml2_sls',
//                'uses' => $saml2_controller.'@sls',
//            ));
//        });
//    });


Route::get('subscripe', 'HomeController@landingPage');
Route::post('newsletter/item' , 'NewsletterController@store');
Route::get('professional-certificates' , 'HomeController@professionalcertificateshome');