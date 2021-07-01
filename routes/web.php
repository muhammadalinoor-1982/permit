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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','Frontend\FrontendController@index');
Route::get('/aboutus','Frontend\FrontendController@aboutUs')->name('AboutUs');
Route::get('/contactus','Frontend\FrontendController@contactUs')->name('ContactUs');

Route::get('/custSignIn','Frontend\CustPrivController@custSignIn')->name('custSignIn');
Route::get('/custSignUp','Frontend\CustPrivController@custSignUp')->name('custSignUp');
Route::post('/custStore','Frontend\CustPrivController@custStore')->name('custStore');
Route::get('/EmailVerification','Frontend\CustPrivController@EmailVerification')->name('EmailVerification');
Route::post('/verifyStore','Frontend\CustPrivController@verifyStore')->name('verifyStore');

Auth::routes();

Route::group(['middleware' => ['auth','frontend']],function (){
    Route::get('/custPanel','Frontend\CustPanelController@custPanel')->name('custPanel');
});

Route::group(['middleware' => ['auth','backend']],function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::prefix('users')->group(function (){
        Route::get('/view','Backend\UserController@view')->name('users.view');
        Route::get('/create','Backend\UserController@create')->name('users.create');
        Route::post('/store','Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
        Route::delete('/delete/{id}','Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('MulDel')->group(function()
    {
        Route::get('/view', 'Backend\MulDelController@view')->name('MulDel.view');
        Route::get('/create', 'Backend\MulDelController@create')->name('MulDel.create');
        Route::post('/store', 'Backend\MulDelController@store')->name('MulDel.store');
        Route::get('/edit/{id}', 'Backend\MulDelController@edit')->name('MulDel.edit');
        Route::post('/update/{id}', 'Backend\MulDelController@update')->name('MulDel.update');
        Route::delete('/delete/{id}', 'Backend\MulDelController@delete')->name('MulDel.delete');
        Route::post('/multipleusersdelete', 'Backend\MulDelController@multipleusersdelete')->name('MulDel.deleteAll');
    });
});
