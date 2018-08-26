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

Route::get('/todo', 'TodoController@index')->name('todo.index');
Route::post('/todo', 'TodoController@store')->name('todo.store');
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
Route::delete('/todo/{id}', 'TodoController@destroy')->name('todo.destroy');
Route::post('/todo/{id}/complete', 'TodoController@complete')->name('todo.complete');
