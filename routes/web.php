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
Route::get('/profile', function () {
    return view('web.profile');
});
Route::get('customer/signup', 'Customer\CustomerController@create')->name('customer.create');
Route::post('customer/store', 'Customer\CustomerController@store')->name('customer.store');
Route::get('customer/edit', 'Customer\CustomerController@edit')->name('customer.edit');
Route::get('customer/signin', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('customer/signin/submit', 'Auth\CustomerLoginController@login')->name('customer.login.submit');

Route::get('/customer/profile', function () {
    return view('web.customer.profile');})->name('customer.profile');



/* Admin routes 
===============================================
*/
Route::middleware(['transaction'])->name('admin.')->namespace('Admin')->prefix('admin')->group(function () {
	Route::get('dashboard', function () {
	    return view('backend.dashboard');
	});

	Route::resource('celebrities', 'CelebrityController');
	Route::resource('celebritypackages', 'CelebrityPackageController');
	Route::resource('packages', 'PackageController');
});
Route::middleware(['transaction'])->name('admin.')->namespace('Customer')->prefix('admin')->group(function () {
	Route::resource('customers', 'CustomerController')->only(['index','destroy']);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
