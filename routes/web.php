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

    //SP2D
    Route::get('/dashaboard/ttd', 'DataController@TtdSp2d')->name('list-ttd');
    Route::get('/dashaboard/updateValid', 'DataController@updateValidData')->name('update-valid');
    Route::get('/dashaboard/listUnit', 'DataController@listUnit')->name('list-unit');

        //SP2D - LS
        Route::get('/dashaboard/listdata', 'DataController@index')->name('list-data');
        Route::get('/dashaboard/getdata', 'DataController@getData')->name('get-data');
        Route::DELETE('/dashaboard/deletedata/{id}', 'DataController@deleteData')->name('delete-data');
        Route::post('/dashaboard/adddata', 'DataController@addData')->name('add-data');
        Route::get('/dashaboard/lookdata/{id}', 'DataController@lookData')->name('look-data');
        Route::get('/dashaboard/lookdatapotongan/{id}', 'DataController@lookDataPotongan')->name('look-data-potongan');
        Route::get('/dashaboard/lookdatapajak/{id}', 'DataController@lookDataPajak')->name('look-data-pajak');
        Route::get('/dashaboard/listSpm', 'DataController@listSpmSp2d')->name('list-spm');

        //SP2D - GU
        Route::get('/dataGU', 'Sp2d\DataGUController@index')->name('list-dataGU');
        Route::get('/dataGU/getdata', 'Sp2d\DataGUController@getData')->name('get-dataGU');
        Route::get('/dataGU/lookdata', 'Sp2d\DataGUController@lookData')->name('look-dataGU');
        Route::get('/dataGU/lookdatapotongan', 'Sp2d\DataGUController@lookDataPotongan')->name('look-data-potonganGU');
        Route::get('/dataGU/lookdatapajak', 'Sp2d\DataGUController@lookDataPajak')->name('look-data-pajakGU');
        Route::get('/dataGU/listSpm', 'Sp2d\DataGUController@listSpmSp2d')->name('list-spmGU');
        Route::post('/dataGU/adddata', 'Sp2d\DataGUController@addData')->name('add-dataGU');
        Route::DELETE('/dataGU/deletedata', 'Sp2d\DataGUController@deleteData')->name('delete-dataGU');
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
