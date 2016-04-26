<?php


Route::get('/', function () {
    return view('welcome'); // Pagina de inicio
});


// Todo lo que esta aqui dentro no se puede ver sino estas logeado primero
Route::group(['middleware' => 'web'], function () {
    Route::auth(); // NO se toca
    Route::get('/home', 'HomeController@index'); //Envia a Homecontroller index
    Route::get('/Report/{Report}','ReportController@index'); //Enviar ReportController index usa el id de un report { id/Report}
    Route::get('/Report','ReportController@update');// Enivar al ReportController Update
    Route::get('/Report/update/{Report}','ReportController@form');//Envia los datos l formulario atravez de report controller form
    Route::post('/Report/update/{Report}/save','ReportController@save'); // Salva los datos
    Route::post('/Report/updateadmin/{Report}/save','ReportController@saveadmin'); // Salva los datos
    Route::get('/Report/mail/{Report}','ReportController@mail'); // Envia el mail
    Route::get('/Report/adminupdate/{Report}','ReportController@updateform'); //Form de admin
	Route::get('import', 'ImportController@import'); // IMporta excel


    
});




