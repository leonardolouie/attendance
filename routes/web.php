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
       
       
       Route::get('/{status}', 'LoginController@index');
       Route::post('login/{status}', 'LoginController@login')->name('login');
       Route::middleware('auth')->prefix('attendance')->group(function(){
       Route::get('/{status}', 'AttendanceController@index');
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

       

       Route::prefix('attendance')->group(function(){
       Route::get('/', 'AdminattendanceController@index')->name('admin.view.attendance');
       Route::get('employee', 'AdminattendanceController@employee_attendance')->name('admin.employee.attendance');
       Route::get('employee/{id}/show', 'AdminattendanceController@show_data');
                     
       });
       Route::prefix('profile')->group(function(){
        Route::get('/', 'AdminController@profile')->name('admin.profile');
        Route::post('update', 'AdminController@update')->name('admin.profile.update');
        Route::post('updatepassword', 'AdminController@update_password')->name('admin.profile.updatepassword');
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
