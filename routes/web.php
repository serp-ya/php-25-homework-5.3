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

Route::get('/', 'ContactsController@showAll')->name('mainPage');
Route::post('/', 'ContactsController@createContact')->name('addContact');

Route::get('/edit', 'ContactsController@showEditInfo')->name('editContact');
Route::post('/edit', 'ContactsController@editContact')->name('updateContact');