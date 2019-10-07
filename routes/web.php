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
})->name('welcome');
Route::get('/yeasts', 'YeastController@getAllYeasts')->name('show-all');
Route::get('/yeasts/add', 'YeastController@showFormAddData')->name('show-form-add-data');
Route::get('/yeasts/{id}', 'YeastController@getDetailYeast')->name('get-detail-yeast');
Route::get('/search', 'YeastController@search')->name('search');
Route::post('/yeasts/add', 'YeastController@addData')->name('add-data');
