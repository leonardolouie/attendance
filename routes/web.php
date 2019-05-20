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





Route::namespace('front')->group(function(){


       Route::get('/', 'LoginController@index');
       Route::get('login', 'LoginController@index')->name('user.login');
       Route::post('login', 'LoginController@login')->name('login');


       Route::middleware('auth')->prefix('attendance')->group(function(){

              Route::get('/', 'AttendanceController@index');
              Route::post('timein', 'AttendanceController@timein')->name('timein');
               Route::post('timeout', 'AttendanceController@timeout')->name('timeout');

       });



});


Route::namespace('root')->prefix('admin')->group(function(){

	 	 Route::get('/', 'AdminController@index');
      	 Route::get('login', 'AdminController@index');
      	 Route::post('login', 'AdminController@login')->name('login.submit');
         Route::get('logout', 'AdminController@logout')->name('logout.submit');

 		Route::middleware('auth:admin')->group(function(){

               Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
                Route::get('api/todaylist', 'AdminController@list');

                 Route::prefix('attendance')->group(function(){
                 Route::get('/', 'AdminattendanceController@index')->name('admin.view.attendance');
                 Route::get('employee', 'AdminattendanceController@employee_attendance')->name('admin.employee.attendance');

                 Route::get('employee/{id}/show', 'AdminattendanceController@show_data');






               });

               Route::prefix('accounts')->group(function(){

                    Route::get('/', 'UserController@index')->name('admin.accounts.index');

                    Route::get('deactivated', 'UserController@deactivated_accounts')->name('admin.accounts.deactivated');



                    Route::get('create', 'UserController@create')->name('admin.accounts.create');
                    Route::post('create', 'Usercontroller@store')->name('admin.accounts.submit');
                    Route::get('{id}/deactivate', 'UserController@deactivate');
                    Route::get('{id}/activate', 'UserController@activate');
                    Route::get('{id}/edit', 'UserController@edit');
                    Route::post('update', 'UserController@update')->name('admin.accounts.update');
                    Route::post('updatepassword', 'UserController@update_password')->name('admin.accounts.updatepassword');


                                    
               });


    
             


       });


});



// Route::post('password/email', [
//   'as' => 'password.email',
//   'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
// ]);
// Route::get('password/reset', [
//   'as' => 'password.request',
//   'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
// ]);
// Route::post('password/reset', [
//   'as' => 'password.update',
//   'uses' => 'Auth\ResetPasswordController@reset'
// ]);
// Route::get('password/reset/{token}', [
//   'as' => 'password.reset',
//   'uses' => 'Auth\ResetPasswordController@showResetForm'
// ]);