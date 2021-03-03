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
Route::get('/bkash','Web\HomeController@bkash');



Route::resource('celebrities', 'Web\CelebrityController')->only(['index','show']);

Route::namespace('Auth')->name('web.customer.')->prefix('customer')->group(function () {
	Route::post('store', 'CustomerRegisterController@create')->name('store');
	Route::get('signin', 'CustomerLoginController@showLoginForm')->name('login');
	Route::post('signin/submit', 'CustomerLoginController@login')->name('login.submit');
	Route::get('signout', 'CustomerLoginController@logout')->name('logout');
});

Route::middleware(['auth:customer', 'transaction'])->namespace('Customer')->name('web.customer.')->prefix('customer')->group(function () {
	Route::get('edit', 'CustomerController@edit')->name('edit');
	Route::get('{customer}','CustomerController@show')->name('show');
});

Route::middleware(['auth:customer', 'transaction'])->namespace('Customer')->prefix('customer')->group(function () {
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
Route::middleware(['auth','transaction'])->namespace('Backend')->name('backend.admin.')->prefix('backend/admin')->group(function () {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	
	Route::get('/sort/data', 'DashboardController@serialize')->name('data.serialize');
	
	Route::resource('celebrities', 'CelebrityController');
	Route::get('/celebrities/{celebrity}/requests', 'CelebrityController@books')->name('celebrities.requests');
	
	Route::resource('celebritypackages', 'CelebrityPackageController')->except(['show']);
	Route::get('celebrity-package/{celebrity}', 'CelebrityPackageController@celebrityPackage')->name('celebrity.package');
	
	Route::resource('packages', 'PackageController')->except(['show']);

	Route::resource('categories', 'CategoryController');

	Route::resource('tags', 'TagController');

	Route::resource('requests', 'BookController')->except(['destroy']);
});

// Admin-Customer
Route::middleware(['auth','transaction'])->namespace('Customer')->name('backend.admin.')->prefix('backend/admin')->group(function () {
	Route::resource('customers', 'CustomerController')->only(['index','destroy']);
});

// Celebrity-Celebrity
Route::namespace('Auth')->name('backend.celebrity.')->prefix('backend/celebrity')->group(function () {
	Route::get('/login', 'CelebrityLoginController@showLoginForm')->name('login');
	Route::post('/login-check', 'CelebrityLoginController@login')->name('check');
    Route::post('/logout', 'CelebrityLoginController@logout')->name('logout');
});
Route::middleware(['auth:celebrity', 'transaction'])->namespace('Backend')->name('backend.')->prefix('backend')->group(function () {
	Route::resource('/celebrities', 'CelebrityController')->except(['index','destroy']);
});	
Route::middleware(['auth:celebrity', 'transaction'])->namespace('Backend')->name('backend.celebrities.')->prefix('backend/celebrities')->group(function () {
	Route::get('/{celebrity}/requests', 'CelebrityController@books')->name('requests');
	Route::post('/requests/{request}', 'BookController@destroy')->name('requests.delete');
	Route::post('/requests/{request}/getAccepted', 'BookController@getAccepted')->name('requests.accept');
	Route::post('/requests/{request}/getRejected', 'BookController@getRejected')->name('requests.reject');
	Route::get('/videos/index/{celebrity}', 'VideoController@index')->name('videos.index');
	Route::get('/videos/create/{id}', 'VideoController@create')->name('videos.create');
	Route::post('/videos/store', 'VideoController@store')->name('videos.store');
	Route::delete('/videos/delete/{id}', 'VideoController@destroy')->name('videos.destroy');
	Route::get('/videos/{id}/make-featured', 'VideoController@featured')->name('videos.make.featured');
	Route::resource('requests', 'BookController');
});
/* Backend routes 
===============================================
*/


