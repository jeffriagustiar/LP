<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['role:user']], function () {
    
    Route::get('/dashaboard', 'DashaboardController@index')->name('dashaboard');
    Route::get('/dashaboard/listdata', 'DataController@index')->name('list-data');
    Route::get('/dashaboard/getdata', 'DataController@getData')->name('get-data');
    Route::DELETE('/dashaboard/deletedata/{id}', 'DataController@deleteData')->name('delete-data');
    Route::post('/dashaboard/adddata', 'DataController@addData')->name('add-data');
    Route::get('/dashaboard/lookdata/{id}', 'DataController@lookData')->name('look-data');
    Route::get('/dashaboard/lookdatapotongan', 'DataController@lookDataPotongan')->name('look-data-potongan');
    Route::get('/dashaboard/lookdatapajak', 'DataController@lookDataPajak')->name('look-data-pajak');
});

Route::get('/', 'LandingPageController@index')->name('landing');
Route::get('/sum1', 'LandingPageController@sum1')->name('sum1');
Route::get('/sum2', 'LandingPageController@sum2')->name('sum2');
Route::get('/datachart', 'LandingPageController@dataChart')->name('datachart');
Route::get('/dataload', 'LandingPageController@dataload')->name('dataload');
Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
});
