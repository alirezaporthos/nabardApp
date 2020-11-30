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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');

Route::namespace('Admin')->name('dashboard.')->middleware('auth')->group(function(){

    Route::get('/', 'DashboardController@index')->name('index');

    //teams route
    Route::resource('teams', 'TeamController')->only(['edit','update','index','destroy']);

    Route::post('/teams/download', 'TeamController@download')->name('teams.file-download');




});

