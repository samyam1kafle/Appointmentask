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

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/'], function () {

    Route::get('/', 'FrontEndControllers\frontEndController@index')->name('index');

    Route::any('/login', 'FrontEndControllers\frontEndController@login_index')->name('login');

    Route::any('/logout', 'FrontEndControllers\frontEndController@logout')->name('log-out');

    Route::get('/register', 'FrontEndControllers\frontEndController@register')->name('register');




});


Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function () {
    Route::get('/index', 'AdminControllers\dashboardController@index')->name('admin-dashboard');


    Route::resource('/AvailableDate', 'AdminControllers\Available_DateController');
    Route::resource('/AvailableTime', 'AdminControllers\Available_TimeController');
    Route::resource('/Date_Time', 'AdminControllers\Date_TimeController');

    Route::resource('/service', 'AdminControllers\ServiceDetailsController');

    Route::resource('/user', 'AdminControllers\UserController');
    Route::resource('/roles', 'AdminControllers\RolesController');

    Route::resource('/department', 'AdminControllers\DepartmentController');
    Route::resource('/bookings', 'AdminControllers\BookingController');
    Route::resource('/services', 'AdminControllers\ServicesController');
});

