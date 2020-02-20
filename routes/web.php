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

    Route::any('/login/user', 'FrontEndControllers\frontEndController@login_index')->name('login');

    Route::any('/logout/user', 'FrontEndControllers\frontEndController@logout')->name('log-out');

    Route::any('/register/user', 'FrontEndControllers\frontEndController@register')->name('register');

    /*Social Login Routes*/
    Route::get('login/{service}', 'AdminControllers\socialLoginController@redirectToProvider');
    Route::get('login/{service}/callback', 'AdminControllers\socialLoginController@handleProviderCallback');


});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/index','AdminControllers\dashboardController@index')->name('admin-dashboard');

    Route::resource('/bookings', 'AdminControllers\BookingController');
    /*
     * Auth User Profile route*/
    Route::get('/profile', 'AdminControllers\userProfileController@auth_prof')->name('user_profile');

    Route::any('/update-user-profile', 'AdminControllers\userProfileController@prof_update')->name('update_profile');

    /*
         * User details Update routes*/

    Route::resource('/education', 'AdminControllers\UsersUpdateControllers\EducationController');

    Route::PUT('/update-profile-password/{id}', 'AdminControllers\userProfileController@update_user')->name('update-profile');

    // User Education Details
Route::resource('/user_education', 'AdminControllers\UsersUpdateControllers\EducationController');

//User Work Details
Route::resource('/work', 'AdminControllers\UsersUpdateControllers\WorkController');

//User Personal Details
Route::resource('/personal', 'AdminControllers\UsersUpdateControllers\personalDetailController');


//    Service Details Route


    Route::group(['middleware' => ['provider']], function () {
        Route::group(['middleware' => ['super_admin']], function () {

//    User Routes
            Route::resource('/user', 'AdminControllers\UserController');
//    roles route
            Route::resource('/roles', 'AdminControllers\RolesController');
//    User Degree
            Route::resource('/Degree', 'AdminControllers\DegreeController');
//    Department Routes

            Route::resource('/department', 'AdminControllers\DepartmentController');

//    todo routes

            Route::resource('/Todo', 'AdminControllers\TodoController');
            Route::put('/Todo-Pending/{id}', 'AdminControllers\TodoController@pending')->name('pending');
            Route::put('/Todo-Complete/{id}', 'AdminControllers\TodoController@complete')->name('complete');
            Route::put('/Todo-ReAssign/{id}', 'AdminControllers\TodoController@ReAssign')->name('ReAssign');
            Route::put('/Todo-reassign/{id}', 'AdminControllers\TodoController@reaassign')->name('reassign');
        });
        Route::resource('/Date_Time', 'AdminControllers\Date_TimeController');
        Route::resource('/services', 'AdminControllers\ServicesController');
        Route::resource('/service_details', 'AdminControllers\ServiceDetailsController');
        Route::resource('/service_booked', 'AdminControllers\ServiceBookedController');
        Route::resource('/service_complete', 'AdminControllers\ServiceCompleteController');
        Route::resource('/service_cancel', 'AdminControllers\ServiceCancelController');
        Route::resource('/service_reschedule', 'AdminControllers\ServiceRescheduleController');

    });

    Route::group(['middleware' => ['employee']], function () {
//    Task details route

        Route::get('/Employee', 'FrontEndControllers\EmployeeController@GetList')->name('Employee');
        Route::get('/EmployeeDetails/{title}', 'FrontEndControllers\EmployeeController@GetTaskDetail')->name('EmployeeDetails');


    });


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

