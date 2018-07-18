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

Route::get('/', 'HomepageController@index');

Auth::routes();


Route::group(['middleware' => ['guest']], function () {
    Route::get('/loginpage', ['as' => 'myLoginRoute', function () {
        return view('login');
    }]);
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/addbook', 'BookContoller@store');
});










