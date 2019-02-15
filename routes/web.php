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
    return redirect('/login');
});

Auth::routes(['verify'=> true]);

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::resource('/books', 'BookController');
Route::resource('/branchs', 'BranchController');
Route::resource('/categories', 'CategoryController');
Route::resource('/reservation', 'ReservationController');
Route::resource('/users', 'UserController');
