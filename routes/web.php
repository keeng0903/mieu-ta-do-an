<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLangController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::GET('/home', [HomeController::class, 'index'])->name('home');
Route::group(['as' => 'home.','prefix' => 'home'], function (){
    Route::GET('/result_search', [HomeController::class, 'result_search'])->name('result_search');
    Route::GET('/translated', [HomeController::class, 'translated'])->name('translated');
    Route::GET('/input_translated', [HomeController::class, 'input_translated'])->name('input_translated');
    Route::GET('/select_option_language/{id}', [HomeController::class, 'select_option_language'])->name('select_option_language');
    Route::GET('/output_lang', [HomeController::class, 'output_lang'])->name('output_lang');
    Route::GET('/lang_details', [HomeController::class, 'lang_details'])->name('lang_details');
    Route::GET('/check_exist_email', [AuthController::class, 'check_exist_email'])->name('check_exist_email');
    Route::GET('/insert_history', [HomeController::class, 'insert_history'])->name('insert_history');
    Route::GET('/histories', [HomeController::class, 'histories'])->name('histories');
});


//Route::put('/home','UserController@postLogin')->name('engkid.home');

// Route::post('/home','UserController@postLogin')->name('engkid.home');


// Route::get('/home','HomeController@index')->name('engkid.home');


// Route::get('/admin', 'UserController@admin');



Route::get('/register','AuthController@register')->name('engkid.register');

Route::get('/forgot','AuthController@forgot')->name('engkid.forgot');


// Route::get('/search-vocabulary', 'SearchController@search')->name('engkids.search');


Route::get('/search','SearchController@search')->name('engkid.search');

Route::get('/search/{id}','SearchController@detail')->name('engkid.detail');

Route::get('/camera','CameraController@camera')->name('camera');

Route::group(['middleware' => ['check_login_admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::POST('/confirm', [AdminController::class, 'confirm'])->name('confirm');
    Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

    //manage user
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/list', [AdminUserController::class, 'index'])->name('list');

    });

    //manage language
    Route::group(['prefix' => 'lang', 'as' => 'lang.'], function () {
        Route::get('/list', [AdminLangController::class, 'index'])->name('list');

    });
});

//user
Route::group(['middleware' => ['check_login_user'], 'as' => 'user.', 'prefix' => 'user'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::GET('/confirm', [AuthController::class, 'confirm'])->name('confirm');
    Route::GET('/confirm-register', [AuthController::class, 'confirm_register'])->name('confirm-register');

});


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
