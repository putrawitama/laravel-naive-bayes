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

Route::get('/', function () {
    return redirect()->route('test');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('data');
})->name('home');

Route::get('/logout', 'AdminController@logout')->name('logout');
Route::get('/uji', 'NaiveCoreController@index')->name('test');
Route::post('/core', 'NaiveCoreController@naiveBayes')->name('naive');

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/data', 'AdminController@index')->name('data');
    Route::post('/data/add', 'AdminController@postData')->name('postData');
    
});