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

    Route::any('/register', 'FrontEndControllers\frontEndController@register')->name('register');




});


Route::group(['prefix' => 'admin' , 'middleware' => ['auth','super_admin']], function () {
    Route::get('/index', 'AdminControllers\dashboardController@index')->name('admin-dashboard');

    Route::resource('/Date_Time', 'AdminControllers\Date_TimeController');
//    Service Details Route
    Route::resource('/service_details','AdminControllers\ServiceDetailsController');
    Route::resource('/service_booked','AdminControllers\ServiceBookedController');
    Route::resource('/service_complete','AdminControllers\ServiceCompleteController');
    Route::resource('/service_cancel','AdminControllers\ServiceCancelController');
    Route::resource('/service_reschedule','AdminControllers\ServiceRescheduleController');


    Route::resource('/user', 'AdminControllers\UserController');
    Route::resource('/roles', 'AdminControllers\RolesController');


    Route::resource('/department','AdminControllers\DepartmentController');
    Route::resource('/bookings','AdminControllers\BookingController');
    Route::resource('/services','AdminControllers\ServicesController');
    Route::resource('/Todo','AdminControllers\TodoController');
    Route::put('/Todo-Pending/{id}','AdminControllers\TodoController@pending')->name('pending');
    Route::put('/Todo-Complete/{id}','AdminControllers\TodoController@complete')->name('complete');
    Route::put('/Todo-ReAssign/{id}','AdminControllers\TodoController@ReAssign')->name('ReAssign');
    Route::put('/Todo-reassign/{id}','AdminControllers\TodoController@reaassign')->name('reassign');

});

