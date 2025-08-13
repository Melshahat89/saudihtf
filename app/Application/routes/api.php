<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::any('site/acceptConfirmationCallback2' , 'PaymentsApi@actionAcceptConfirmationCallback2');  
Route::any('site/FawryConfirmationCallback' , 'PaymentsApi@actionFawryConfirmationCallback'); 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::any('createAppCertificate', 'QuizstudentsstatusApi@createAppCertificate');


Route::group(array('prefix' => 'v1'), function () {

    #courses
    Route::post('courses/getById', 'CoursesApi@inner');
    Route::post('courses/getBySpecialityCode', 'CoursesApi@getBySpecialityCode');
    Route::post('courses/freelanceRegistration', 'CoursesApi@freelanceRegistration');
    Route::post('courses', 'CoursesApi@index');

    
    
//    require __DIR__.'/appendApi.php';
});