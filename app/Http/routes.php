<?php


Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/Report/{Report}','ReportController@index');
    Route::get('/Report','ReportController@update');
    Route::get('/Report/update/{Report}','ReportController@form');
    Route::post('/Report/update/{Report}/save','ReportController@save');
    Route::post('/Report/updateadmin/{Report}/save','ReportController@saveadmin');
    Route::get('/Report/mail/{Report}','ReportController@mail');
    Route::get('/Report/adminupdate/{Report}','ReportController@updateform');
	Route::get('import', 'ImportController@import');


    
});




