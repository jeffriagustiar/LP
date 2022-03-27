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

// Route::get('/', function () {
//     return view('pages.dashaboard');
// });
Route::get('/dashaboard', function () {
        return view('pages.dashaboard');
    })->name('dashaboard');

Route::get('/', 'LandingPageController@index')->name('landing');
Route::get('/sum1', 'LandingPageController@sum1')->name('sum1');
Route::get('/sum2', 'LandingPageController@sum2')->name('sum2');
Route::get('/datachart', 'LandingPageController@dataChart')->name('datachart');