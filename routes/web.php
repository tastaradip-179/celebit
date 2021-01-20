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

/* Website routes */
Route::get('/','Web\HomeController@index')->name('web.home');
Route::get('/test','Web\HomeController@test');

Route::resource('celebrities', 'Web\CelebrityController')->only(['index','show']);

Route::namespace('Auth')->name('web.customer.')->prefix('customer')->group(function () {
	Route::post('store', 'CustomerRegisterController@create')->name('store');
	Route::get('signin', 'CustomerLoginController@showLoginForm')->name('login');
	Route::post('signin/submit', 'CustomerLoginController@login')->name('login.submit');
	Route::get('signout', 'CustomerLoginController@logout')->name('logout');
});

Route::namespace('Customer')->name('web.customer.')->prefix('customer')->group(function () {
	Route::get('edit', 'CustomerController@edit')->name('edit');
	Route::get('{customer}','CustomerController@show')->name('show');
});

Route::namespace('Customer')->prefix('customer')->group(function () {
	Route::resource('books', 'BookController')->except(['create']);
	Route::get('book/{id}', 'BookController@create')->name('web.books.create');
});
/* Website routes */




/* Backend routes 
===============================================
*/
/*Admin Login-logout*/
Route::namespace('Auth')->name('backend.admin.')->prefix('backend/admin')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login-check', 'LoginController@login')->name('check');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

/*Dasboard, Celebrity & Packages*/
Route::middleware(['auth','transaction'])->namespace('Admin')->name('backend.admin.')->prefix('backend/admin')->group(function () {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	
	Route::get('/sort/data', 'DashboardController@serialize')->name('data.serialize');
	
	Route::resource('celebrities', 'CelebrityController');
	Route::get('/celebrities/{celebrity}/requests', 'CelebrityController@books')->name('celebrities.requests');
	
	Route::resource('celebritypackages', 'CelebrityPackageController')->except(['show']);
	
	Route::get('celebrity-package/{celebrity}', 'CelebrityPackageController@celebrityPackage')->name('celebrity.package');
	
	Route::resource('packages', 'PackageController')->except(['show']);

	Route::resource('tags', 'TagController');

	Route::resource('requests', 'BookController');
});

Route::middleware(['transaction'])->namespace('Customer')->name('backend.admin.')->prefix('backend/admin')->group(function () {
	Route::resource('customers', 'CustomerController')->only(['index','destroy']);
});

Route::middleware(['transaction'])->name('backend.')->namespace('Auth')->prefix('backend/celebrity')->group(function () {
	Route::get('/login', 'CelebrityLoginController@showLoginForm')->name('celebrity.login');
	Route::post('/login-check', 'CelebrityLoginController@login')->name('celebrity.check');
    Route::post('/logout', 'CelebrityLoginController@logout')->name('celebrity.logout');
});
/* Backend routes 
===============================================
*/


