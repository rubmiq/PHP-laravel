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

Route::get('/', 'Todo_Controller@index');
Route::post('/add_row', 'Todo_Controller@add');
Route::get('/delete_mirror/{id}', 'Todo_Controller@delete_row');
Route::get('/edit/{id}', 'Todo_Controller@edit');
Route::post('/update_row', 'Todo_Controller@update');
