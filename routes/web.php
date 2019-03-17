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
Route::get('/create/order', 'OrderController@index')->name('create_order') ;

Route::post('/ph', 'PHController@store')->name('ph') ;
Route::get('/cash_deposited/{id}', 'PHController@cash_deposited')->name('cash_deposited') ;
Route::get('/cash_received/{id}', 'PHController@cash_received')->name('cash_received') ;


Route::get('/admin_allocation', 'AdminController@admin_allocation')->name('admin_allocation') ;
Route::post('/admin_allocation', 'AdminController@post_admin_allocation')->name('post_admin_allocation') ;
Route::get('/member_allocation', 'AdminController@member_allocation')->name('member_allocation') ;
Route::post('/member_allocation', 'AdminController@member_allocation')->name('post_member_allocation') ;
Route::get('/users', 'AdminController@users')->name('users') ;
Route::get('/orders', 'AdminController@orders')->name('orders') ;
Route::get('/block', 'AdminController@block')->name('block') ;

Route::get('/password', 'PasswordController@index')->name('password') ;
Route::post('/password', 'PasswordController@update')->name('password') ;
Route::get('/account', 'AccountController@index')->name('account') ;
Route::post('/account', 'AccountController@update')->name('account') ;
Route::get('/incoming', 'IncomingController@index')->name('incoming') ;
Route::get('/outgoing', 'OutgoingController@index')->name('outgoing') ;
