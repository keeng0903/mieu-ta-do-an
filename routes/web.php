<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\Events\RouteMatched;
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

Route::get('/','AuthController@login')->name('engkid.login');

Route::post('/home','UserController@postLogin')->name('engkid.home');

// Route::post('/home','UserController@postLogin')->name('engkid.home');


// Route::get('/home','HomeController@index')->name('engkid.home');


Route::get('/logout', 'UserController@logout')->name('engkid.logout');


// Route::get('/admin', 'UserController@admin');



Route::get('/register','AuthController@register')->name('engkid.register');

Route::get('/forgot','AuthController@forgot')->name('engkid.forgot');


// Route::get('/search-vocabulary', 'SearchController@search')->name('engkids.search');


Route::get('/search','SearchController@search')->name('engkid.search');

Route::get('/search/{id}','SearchController@detail')->name('engkid.detail');



Route::get('/camera','CameraController@camera')->name('engkid.camera');


// Route::get('/camera','CameraController@searchdetect')->name('engkid.camera');
// Route::get('/search/{id}','SearchController@detail2')->name('engkid.detail2');

// Route::get('/search-hover','SearchController@searchhover')->name('engkid.searchhover');

// // Route::get('/login', function () {
// //     return view('auth/login');
// // });

// Route::get('/','HomeController@index');


// Route::get('/login','Usercontroller@login')->name('auth.login');
// Route::post('/login','Usercontroller@login')->name('auth.login');



// Route::group(['middleware' => 'guest'], function(){
//     Route::match(['get', 'post'], '/login','Usercontroller@login');
    
// });

// Route::group(['middleware' => 'auth'], function(){
//     Route::get('/','HomeController@index');
// });