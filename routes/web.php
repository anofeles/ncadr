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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/local/{locale}', 'HomeController@index')->name('home.locale');
Route::get('/{locale}/{type}/{mid}/{slug}', 'HomeController@post')->name('home.post');
Route::get('/{locale}/full/{postid}', 'HomeController@full')->name('home.full');
Route::get('/{locale}/galeri/{galtid}', 'HomeController@galfull')->name('home.galfull');
Route::post('/search', 'HomeController@search')->name('home.search');
Route::post('/subscribe', 'HomeController@Subscribe')->name('home.subscribe');
Route::post('/contaqt', 'HomeController@contaqtncadr')->name('home.contaqtncadr');
Route::get('/subscribe/{uuid}', 'HomeController@removesubscriber')->name('home.removesubscriber');

Route::get('/{locale}/librari', 'HomeController@indexlibrari')->name('home.searchlibrari');
Route::post('/{locale}/librari', 'HomeController@indexlibrari')->name('home.searchlibrari');
Route::post('/{locale}/librarimore', 'HomeController@moresearch')->name('home.moresearch');
Route::get('/{locale}/librari/{librariid}', 'HomeController@librarifull')->name('home.searchlibrari.id');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//Route::get('/home', 'HomeController@index')->name('home');
