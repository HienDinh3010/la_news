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
    return view('welcome');
});

Route::get('bv/','BaivietController@index');
Route::get('/','BaivietController@index')->name('/');
Route::get('/tin/{id}', 'BaivietController@detail');
Route::get('loai/{TenKD}', 'baivietController@cat');
Route::get('search/{Keyword}', 'baivietController@search');
Route::get('doingonngu/{language}', 'BaivietController@changeLanguage')
        ->name('change-lang');
Route::get('lienhe/', 'baivietController@lienhe');
Route::post('lienhe/', 'GuimailController@guimaillienhe');
Route::resource('theloai', 'TheloaiController');
        