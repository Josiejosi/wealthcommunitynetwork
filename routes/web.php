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

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/', 'FrontController@index')->name( 'index' ) ;
Route::get('/contact', 'ContactController@index')->name( 'contact' ) ;
Route::post('/contact', 'ContactController@store')->name( 'contact' ) ;


Auth::routes( ['register' => false] ) ;

Route::get('/home', 'HomeController@index')->name('home') ;
Route::get('/join/{upliner_id}', 'JoinController@index')->name('join') ;
Route::post('/join', 'JoinController@store')->name('join') ;

Route::post('/ph', 'PHController@store')->name('ph') ;
