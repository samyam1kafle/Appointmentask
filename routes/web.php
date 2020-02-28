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
    Route::get('/index', 'AdminControllers\dashboardController@index')->name('admin-dashboard');

    Route::resource('/bookings', 'AdminControllers\BookingController');
    /*
     * Auth User Profile route*/
    Route::get('/profile', 'AdminControllers\userProfileController@auth_prof')->name('user_profile');

    Route::any('/update-user-profile', 'AdminControllers\userProfileController@prof_update')->name('update_profile');

    /*
         * User details Update routes*/

    Route::resource('/education', 'AdminControllers\UsersUpdateControllers\EducationController');

    Route::PUT('/update-profile-password/{id}', 'AdminControllers\userProfileController@update_user')->name('update-profile');

    /*Notification read*/
    Route::get('/notification/read','FrontEndControllers\frontEndController@markasread')->name('markedAsRead');


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
            Route::put('/Todo-ReAssign/{id}', 'AdminControllers\TodoController@ReAssign')->name('ReAssign');
            Route::put('/Todo-reassign/{id}', 'AdminControllers\TodoController@reaassign')->name('reassign');
            Route::get('/Todo-detail/{title}', 'AdminControllers\TodoController@GetTaskDetail')->name('Todo-detail');

        });
        Route::resource('/Date_Time', 'AdminControllers\Date_TimeController');
        Route::resource('/services', 'AdminControllers\ServicesController');
        Route::resource('/service_details', 'AdminControllers\ServiceDetailsController');
        Route::get('/service_pending', 'AdminControllers\ServiceDetailsController@Pending')->name('service_pending');
        Route::get('/service_booked', 'AdminControllers\ServiceDetailsController@Booked')->name('service_booked');
        Route::get('/service_complete', 'AdminControllers\ServiceDetailsController@Completed')->name('service_complete');
        Route::get('/service_cancel', 'AdminControllers\ServiceDetailsController@Cancel')->name('service_cancel');
        Route::get('/service_reschedule', 'AdminControllers\ServiceDetailsController@Reschedule')->name('service_reschedule');
        Route::get('/StatusPending/{id}', 'AdminControllers\ServiceDetailsController@StatusPending')->name('StatusPending');
        Route::get('/StatusCompleted/{id}', 'AdminControllers\ServiceDetailsController@StatusCompleted')->name('StatusCompleted');
        Route::get('/StatusCancel/{id}', 'AdminControllers\ServiceDetailsController@StatudCancel')->name('StatusCancel');
        Route::get('/StatusReschedule/{id}', 'AdminControllers\ServiceDetailsController@StatusReschedule')->name('StatusReschedule');

    });




});



Route::get('/home', 'HomeController@index')->name('home');

