<?php



Route::get('/9972yaphd3ny9d9', function(){
    return \Illuminate\Http\Response::create("error 410", 410);
});


Route::get('{key}', [\App\Application\Controllers\Website\SeoerrorsController::class, 'getById']);


Route::get('404' , function(){
    return view('errors.404');
});