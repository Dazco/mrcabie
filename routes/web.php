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

Route::get('/', 'FrontendController@index')->name("home");
Route::get('about', 'FrontendController@about')->name("about");
Route::get('services', 'FrontendController@services')->name("services");
Route::get('gallery', 'FrontendController@gallery')->name("gallery");
Route::get('contact', 'FrontendController@contact')->name("contact");
Route::get('select', 'FrontendController@select')->name("select");
Route::get('paynow', 'FrontendController@paynow')->name("paynow");

Auth::routes();
