<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('departments','DepartmentController');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');
    Route::resource('leaves','LeaveController');
    Route::resource('notices','NoticeController');
    Route::post('accept-reject-leave/{id}','LeaveController@acceptReject')->name('accept.reject');
    Route::get('/mail','MailController@create');
    Route::post('/mail','MailController@store')->name('mails.store');
});
// Route::view('employee','admin.create');
