<?php


use Illuminate\Support\Facades\Route;


#### partnership control - OUTDATED
// Route::get('partnership/addCourse/{id?}' , 'PartnershipController@addCourse');
// Route::post('partnership/saveCourse' , 'PartnershipController@saveCourse');
// Route::post('partnership/saveCourse/{id}' , 'PartnershipController@updateCourse');
// Route::get('partnership/addLectures/{course_id}' , 'PartnershipController@addLectures');
// Route::post('partnership/saveLectures/{course_id}' , 'PartnershipController@saveLectures');
// Route::post('partnership/saveLecturesSections/{course_id}' , 'PartnershipController@saveLecturesSections');
// Route::post('partnership/item/{id}' , 'PartnershipController@update');
// Route::get('partnership/{id}/delete' , 'PartnershipController@destroyLecture');
// Route::get('partnership/addResources/{course_id}' , 'PartnershipController@addResources');
// Route::post('partnership/saveResources/{course_id}' , 'PartnershipController@saveResources');
// Route::get('partnership/addExams/{course_id}' , 'PartnershipController@addExams');
// Route::post('partnership/saveExams/{course_id}/{id?}' , 'PartnershipController@saveExams');
// Route::post('partnership/saveQuestion/{course_id}' , 'PartnershipController@saveQuestion');
// Route::post('partnership/saveAnswer/{course_id}' , 'PartnershipController@saveAnswer');
// Route::get('partnership/myCourses' , 'PartnershipController@myCourses');

#### Business control - OUTDATED
 Route::get('business/home' , 'BusinessdataController@home');
 Route::any('business/settings' , 'BusinessdataController@settings');
 Route::get('business/users' , 'BusinessdataController@users');
 Route::get('business/groups' , 'BusinessdataController@groups');
 Route::get('business/groups/{id}' , 'BusinessdataController@groups');
 Route::get('business/users-information' , 'BusinessdataController@usersInformation');
 Route::get('business/users-suspend/{id}' , 'BusinessdataController@usersSuspend');
 Route::get('business/users-active/{id}' , 'BusinessdataController@usersActive');
 Route::get('business/invite-users' , 'BusinessdataController@inviteUsers');
 Route::get('business/enrollments' , 'BusinessdataController@enrollments');
 Route::get('business/user-adoption-funnel' , 'BusinessdataController@userAdoptionFunnel');
 Route::get('business/courses-insight' , 'BusinessdataController@coursesInsight');
 Route::get('business/users-insight' , 'BusinessdataController@usersInsight');
 Route::get('business/user-activity' , 'BusinessdataController@userActivity');
 Route::get('business/user-activity/{id}' , 'BusinessdataController@userActivityUser');
 Route::post('business/addDomian' , 'BusinessdataController@addDomian');
 Route::post('business/addGroup' , 'BusinessdataController@addGroup');
 Route::get('business/editgroup/{id}' , 'BusinessdataController@editGroup');
 Route::post('business/updateGroup/{id}' , 'BusinessdataController@updateGroup');
 Route::get('businessdata/{id}/delete' , 'BusinessdataController@destroy');
 Route::post('businessdata/{id}/update' , 'BusinessdataController@update');
 Route::get('businessgroups/{id}/delete' , 'BusinessgroupsController@destroy');
 Route::post('business/invite-bulk-users' , 'BusinessdataController@inviteBulkUsers');
 Route::get('business/tickets' , 'BusinessdataController@tickets');
 Route::get('business/tickets/replays/{ticket_id}' , 'BusinessdataController@replays');
 Route::get('generateQrCode', 'BusinessdataController@generateQrCodeAjax');
 Route::post('business/inputs', 'BusinessdataController@addInputFields');
 Route::get('business/editinputfield/{id}', 'BusinessdataController@editInputFields');
 Route::get('business/deleteinputfield/{id}', 'BusinessdataController@deleteInputFields');
Route::get('business/customreports' , 'BusinessdataController@customReports');


Route::get('businessdomains/{id}/verify', 'BusinessdomainsController@verify');

#### Events control - OUTDATED
// Route::get('events/home' , 'EventsdataController@home');
// Route::get('events/settings' , 'EventsdataController@settings');
// Route::post('eventsdata/item/{id}' , 'EventsdataController@update');
// Route::get('events/add-event/{id?}' , 'EventsdataController@addEvent');
// Route::get('events/all' , 'EventsdataController@all');
// Route::get('events/{id}/delete' , 'EventsController@destroy');
// Route::get('events/add-ticket/{id?}' , 'EventsdataController@addTicket');
// Route::post('eventstickets/item' , 'EventsticketsController@store');
// Route::get('eventstickets/{id}/delete' , 'EventsticketsController@destroy');
// Route::get('events/all-ticket' , 'EventsdataController@allTicket');
// Route::get('events/enrollments' , 'EventsdataController@enrollments');
// Route::get('events/revenue' , 'EventsdataController@revenue');
// Route::post('events/item' , 'EventsController@store');
// Route::post('events/item/{id}' , 'EventsController@update');

#### Institution control - OUTDATED
// Route::get('institution/home' , 'InstitutionController@home');





#### ipcurrency control
Route::get('ipcurrency' , 'IpcurrencyController@index');
Route::get('ipcurrency/item/{id?}' , 'IpcurrencyController@show');
Route::post('ipcurrency/item' , 'IpcurrencyController@store');
Route::post('ipcurrency/item/{id}' , 'IpcurrencyController@update');
Route::get('ipcurrency/{id}/delete' , 'IpcurrencyController@destroy');
Route::get('ipcurrency/{id}/view' , 'IpcurrencyController@getById');

#### seoerrors control
Route::get('seoerrors' , 'SeoerrorsController@index');
Route::get('seoerrors/item/{id?}' , 'SeoerrorsController@show');
Route::post('seoerrors/item' , 'SeoerrorsController@store');
Route::post('seoerrors/item/{id}' , 'SeoerrorsController@update');
Route::get('seoerrors/{id}/delete' , 'SeoerrorsController@destroy');
Route::get('seoerrors/{id}/view' , 'SeoerrorsController@getById');

#### subscriptionuser control
Route::get('subscriptionuser' , 'SubscriptionuserController@index');
Route::get('subscriptionuser/item/{id?}' , 'SubscriptionuserController@show');
Route::post('subscriptionuser/item' , 'SubscriptionuserController@store');
Route::post('subscriptionuser/item/{id}' , 'SubscriptionuserController@update');
Route::get('subscriptionuser/{id}/delete' , 'SubscriptionuserController@destroy');
Route::get('subscriptionuser/{id}/view' , 'SubscriptionuserController@getById');

#### currencies control
Route::get('currencies' , 'CurrenciesController@index');
Route::get('currencies/item/{id?}' , 'CurrenciesController@show');
Route::post('currencies/item' , 'CurrenciesController@store');
Route::post('currencies/item/{id}' , 'CurrenciesController@update');
Route::get('currencies/{id}/delete' , 'CurrenciesController@destroy');
Route::get('currencies/{id}/view' , 'CurrenciesController@getById');

#### spin control
Route::get('spin' , 'SpinController@index');
Route::get('spin/item/{id?}' , 'SpinController@show');
Route::post('spin/item' , 'SpinController@store');
Route::post('spin/item/{id}' , 'SpinController@update');
Route::get('spin/{id}/delete' , 'SpinController@destroy');
Route::get('spin/{id}/view' , 'SpinController@getById');


Route::post('businessinvitation', 'BusinessInvitationController@store');
Route::post('businessinvitation/{id}', 'BusinessInvitationController@update');
Route::get('businessinvitation/{id}', 'BusinessInvitationController@show');
Route::get('businessinvitation/{id}/delete', 'BusinessInvitationController@destroy');





#### sectionquiz control
Route::get('sectionquiz' , 'SectionquizController@index');
Route::get('sectionquiz/item/{id?}' , 'SectionquizController@show');
Route::post('sectionquiz/item' , 'SectionquizController@store');
Route::post('sectionquiz/item/{id}' , 'SectionquizController@update');
Route::get('sectionquiz/{id}/delete' , 'SectionquizController@destroy');
Route::get('sectionquiz/{id}/view' , 'SectionquizController@getById');

#### sectionquizquestions control
Route::get('sectionquizquestions' , 'SectionquizquestionsController@index');
Route::get('sectionquizquestions/item/{id?}' , 'SectionquizquestionsController@show');
Route::post('sectionquizquestions/item' , 'SectionquizquestionsController@store');
Route::post('sectionquizquestions/item/{id}' , 'SectionquizquestionsController@update');
Route::get('sectionquizquestions/{id}/delete' , 'SectionquizquestionsController@destroy');
Route::get('sectionquizquestions/{id}/view' , 'SectionquizquestionsController@getById');

#### sectionquizchoise control
Route::get('sectionquizchoise' , 'SectionquizchoiseController@index');
Route::get('sectionquizchoise/item/{id?}' , 'SectionquizchoiseController@show');
Route::post('sectionquizchoise/item' , 'SectionquizchoiseController@store');
Route::post('sectionquizchoise/item/{id}' , 'SectionquizchoiseController@update');
Route::get('sectionquizchoise/{id}/delete' , 'SectionquizchoiseController@destroy');
Route::get('sectionquizchoise/{id}/view' , 'SectionquizchoiseController@getById');

#### sectionquizstudentanswer control
Route::get('sectionquizstudentanswer' , 'SectionquizstudentanswerController@index');
Route::get('sectionquizstudentanswer/item/{id?}' , 'SectionquizstudentanswerController@show');
Route::post('sectionquizstudentanswer/item' , 'SectionquizstudentanswerController@store');
Route::post('sectionquizstudentanswer/item/{id}' , 'SectionquizstudentanswerController@update');
Route::get('sectionquizstudentanswer/{id}/delete' , 'SectionquizstudentanswerController@destroy');
Route::get('sectionquizstudentanswer/{id}/view' , 'SectionquizstudentanswerController@getById');

#### sectionquizstudentstatus control
Route::get('sectionquizstudentstatus' , 'SectionquizstudentstatusController@index');
Route::get('sectionquizstudentstatus/item/{id?}' , 'SectionquizstudentstatusController@show');
Route::post('sectionquizstudentstatus/item' , 'SectionquizstudentstatusController@store');
Route::post('sectionquizstudentstatus/item/{id}' , 'SectionquizstudentstatusController@update');
Route::get('sectionquizstudentstatus/{id}/delete' , 'SectionquizstudentstatusController@destroy');
Route::get('sectionquizstudentstatus/{id}/view' , 'SectionquizstudentstatusController@getById');

#### futurex control
Route::get('futurex' , 'FuturexController@index');
Route::get('futurex/item/{id?}' , 'FuturexController@show');
Route::post('futurex/item' , 'FuturexController@store');
Route::post('futurex/item/{id}' , 'FuturexController@update');
Route::get('futurex/{id}/delete' , 'FuturexController@destroy');
Route::get('futurex/{id}/view' , 'FuturexController@getById');

#### newsletter control
//Route::get('newsletter' , 'NewsletterController@index');
//Route::get('newsletter/item/{id?}' , 'NewsletterController@show');
//Route::post('newsletter/item/{id}' , 'NewsletterController@update');
//Route::get('newsletter/{id}/delete' , 'NewsletterController@destroy');
//Route::get('newsletter/{id}/view' , 'NewsletterController@getById');