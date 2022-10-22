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

Route::resource('/', 'App\Http\Controllers\MainPageController')
        ->names('main')
        ->only('index');

Route::resource('list', 'App\Http\Controllers\MainPageController')
        ->names('main')
        ->only('show');


Route::resource('manager', 'App\Http\Controllers\Manager\NewsController')
        ->names('manager')
        ->except('show');

