<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::group(['middleware'=>['web']],function(){
    Route::get('/message-app',function(){
        return redirect('/contacts');
    });
    //Route::get('','');
    Route::get('/contacts','ContactController@index');
    Route::get('/contacts/create','ContactController@create');
    Route::post('/contacts','ContactController@store');
    Route::get('/contacts/{id}/show','ContactController@showContact');
    Route::get('/contacts/{id}/delete','ContactController@deleteContact');
    Route::get('/contacts/{id}/edit','ContactController@editContact');
    Route::post('/contacts/{id}/store','ContactController@editStoreContact');
    Route::get('/contacts/{id}/sms/{user_id}','PostController@createPost');
    Route::get('/contacts/{id_contact}/show/{user_id}/inbox','PostController@showInbox');
    Route::get('/contacts/{id_contact}/show/{user_id}/sent','PostController@showSent');
    Route::get('/contacts/{id_contact}/editPost/{user_id}/{post_id}','PostController@editPost');
    Route::get('/contacts/inbox','PostController@Inbox');
    Route::get('/contacts/post/{post_id}','PostController@postInbox');
    Route::post('/contacts/{id}/sms','PostController@storePost');

    Route::auth();
    Route::get('/home', 'HomeController@index');
//});
