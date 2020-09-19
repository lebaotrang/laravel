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
//     return view('welcome');
// });

// get data from public api and export a row to pdf
Route::get('/exportPDF/{index}','UserDetailController@exportPDF');
Route::get('/exportPDFAll','UserDetailController@exportPDFAll');
Route::get('getData','UserDetailController@getData');
Route::post('getData','UserDetailController@submitField');


// from db test
Route::get('/index','UserDetailController@index');
Route::get('/', function () {
    return view('form');
});
Route::get('/downloadPDF/{id}','UserDetailController@downloadPDF');
Route::post('submitForm','UserDetailController@store');

