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

Route::get('/books', 'App\Http\Controllers\bookController@index')->name('books.index');

Route::get('/admin/login', 'App\Http\Controllers\AdminBooksController@showLoginForm')->name('login');
Route::post('/admin/login', 'App\Http\Controllers\AdminBooksController@login');
Route::post('/admin/logout', 'App\Http\Controllers\AdminBooksController@logout')->name('logout');

Route::get('/admin/dashboard', 'App\Http\Controllers\AdminDashboardController@index')->name('admin.dashboard')->middleware('nocache');
Route::get('/admin/books/{id}/edit', 'App\Http\Controllers\AdminDashboardController@edit');
Route::put('/admin/books/{id}', 'App\Http\Controllers\AdminDashboardController@update');
Route::delete('/admin/books/{id}', 'App\Http\Controllers\AdminDashboardController@destroy');






