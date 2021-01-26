<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});




Route::group(['prefix'=>'admin'],function(){
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Admin\ResetPasswordController@reset');

    //all user list
    Route::get('/all-user','AdminController@userList')->name('all-user');
    Route::get('/all-donor','AdminController@donorList')->name('all-donor');
    Route::get('/all-request','AdminController@index')->name('all-request');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


 Route::group(['prefix'=>'/'],function(){
     Route::get('all/request/list','BloodRequestController@index');
     Route::post('user-donate/{id}','DonerController@store')->name('user-donate');
     Route::post('blood-request','BloodRequestController@store')->name('blood-request');
     Route::get('all-donors','DonerController@donorLists')->name('all-donors-list');
     Route::get('view-request/{id}','BloodRequestController@viewRequest')->name('view-request');
     Route::get('time','DefaultController@index')->name('time-date');

 });

