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


Route::get('/','Web\HomeController@index')->name('web.home');
Route::resource('celebrities', 'Web\CelebrityController')->only(['show']);
Route::get('customer/signup', 'Customer\CustomerController@create')->name('customer.create');
Route::post('customer/store', 'Customer\CustomerController@store')->name('customer.store');
Route::get('customer/edit', 'Customer\CustomerController@edit')->name('customer.edit');
Route::get('customer/signin', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('customer/signin/submit', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
Route::get('customer/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');
Route::get('customer/{customer}','Customer\CustomerController@show')->name('customer.profile');

Route::resource('books', 'Customer\BookController')->except('create');
Route::get('/request/{id}', 'Customer\BookController@create')->name('request.create');





/* Backend routes 
===============================================
*/

/*Admin Login-logout*/
Route::group(['prefix'=>'backend', 'namespace'=>'Auth'], function(){
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login-check', 'LoginController@login')->name('admin.check');
    
    Route::post('/logout', 'LoginController@logout')->name('admin.logout');
   
});

/*Dasboard, Celebrity & Packages*/
Route::middleware(['auth','transaction'])->name('admin.')->namespace('Admin')->prefix('backend')->group(function () {
	Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
	
	Route::get('/sort/data', 'DashboardController@serialize')->name('data.serialize');
	
	Route::resource('celebrities', 'CelebrityController');
	
	Route::resource('celebritypackages', 'CelebrityPackageController');
	
	Route::resource('packages', 'PackageController');
});

Route::middleware(['transaction'])->name('admin.')->namespace('Customer')->prefix('backend')->group(function () {
	Route::resource('customers', 'CustomerController')->only(['index','destroy']);
});



//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
