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

Route::get('/', function () {
    return view('web.home');
});
Route::get('/profile', function () {
    return view('web.profile');
});

/* Admin routes 
===============================================
*/
Route::middleware(['transaction'])->name('admin.')->namespace('Admin')->prefix('admin')->group(function () {
	Route::get('dashboard', function () {
	    return view('backend.dashboard');
	});

	Route::resource('celebrities', 'CelebrityController');
});


