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

Route::middleware('authuser')->group(function()
{
    Route::get('/myprofile', 'userController@myprofile');
    Route::get('/myhistory', 'userController@myhistory');
    Route::get('/auto-recharge', 'userController@autoRecharge');
    Route::post('/auto-recharge-store', 'userController@autoRechargeStore');
    Route::get('/show-pre-recharge', 'userController@showPreAutoRecharge');
    Route::get('/myprofile/wallet', 'userController@wallet');
    Route::post('/walletrecharge', 'HomeController@walletrecharge');
    Route::post('/mobilerecharge', 'HomeController@mobilerecharge');
    Route::post('/mobilerechargemiddle', 'HomeController@mobilerechargemiddle');

});
Route::post('/walletrechargeresponse', '\App\Classes\Wallet@gateway_Response_Handler_wallet');
Route::post('/mobilerechargeresponse', '\App\Classes\Wallet@gateway_Response_Handler_mobile');

Route::post('recharge', 'HomeController@rechargeMobile')->middleware('web');
Route::get('/ccavform', 'HomeController@ccavform');
Route::get('/ccavredirect', 'HomeController@ccavRequestHandler');
Route::group(['prefix' => 'frontend'], function()
{

    Route::get('/', 'TrackController@index');

    Route::get('/aboutus', 'HomeController@aboutus');

    Route::get('/faq', 'HomeController@faq');

    Route::get('/bus', 'HomeController@bus');

    Route::get('/support', 'HomeController@support');

    Route::get('/sitemap', 'HomeController@sitemap');

    Route::get('/terms', 'HomeController@terms');

    Route::get('/contact', 'HomeController@contact');

    Route::post('/updateTrack', 'TrackController@updateTrack');

    Route::get('/login', 'TrackController@login');

    Route::post('/login_check', 'TrackController@login_check');

    Route::get('/logout', 'TrackController@logout');

});

Route::auth();
