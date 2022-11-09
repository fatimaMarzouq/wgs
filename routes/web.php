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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/report', [App\Http\Controllers\HomeController::class, 'report'])->name('report');
Route::get('/images', [App\Http\Controllers\HomeController::class, 'images'])->name('images');
Route::get('/images_details/{id}', [App\Http\Controllers\HomeController::class, 'images_details']);
Route::post('areaAccount', '\App\Http\Controllers\HomeController@areaAccount')->name('areaAccount');
Route::post('accountOutlet', '\App\Http\Controllers\HomeController@accountOutlet')->name('accountOutlet');
Route::post('allDetails', '\App\Http\Controllers\HomeController@allDetails')->name('allDetails');
Route::post('compress', '\App\Http\Controllers\HomeController@compress')->name('compress');
Route::post('excel_download', '\App\Http\Controllers\HomeController@excel_download')->name('excel_download');
Route::post('captureStore', '\App\Http\Controllers\HomeController@captureStore')->name('captureStore');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/fillCode', '\App\Http\Controllers\HomeController@fillCode');