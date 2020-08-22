<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//????

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/logs', 'LogController@showLogs')->name('timeline'); //???????
    Route::get('/logs/create', 'LogController@showCreateForm'); //????
    Route::post('/logs/create', 'LogController@create')->name('log.create');
    Route::get('/logs/{id}', 'LogController@show'); //?????
    Route::get('/logs/{id}/edit', 'LogController@showEditForm'); //??
    Route::post('/logs/{id}/edit', 'LogController@update'); //??
    Route::post('/logs/{id}/delete', 'LogController@delete'); //??

    Route::get('/material/create', 'MaterialController@showCreateForm'); //????
    Route::post('/material/create', 'MaterialController@create'); //????
});



//????

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
}); //??
