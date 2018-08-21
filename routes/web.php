<?php

use App\Http\Controllers\ContactsController;

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

Route::get('/', 'ContactsController@showAll');
Route::post('/', 'ContactsController@createContact');

Route::get('/edit', 'ContactsController@showEditInfo');
Route::post('/edit', 'ContactsController@editContact');