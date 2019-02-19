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

Route::get( '/auth/{service}', 'Auth\SocailLoginController@redirect' )->name('social');
Route::get( '/auth/{service}/callback', 'Auth\SocailLoginController@callback' )->name('social.callback');

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@view_profile')->name('profile');
Route::get('/profile/edit', 'HomeController@edit_profile')->name('profile.edit');
Route::post('/profile/edit', 'HomeController@update_profile');

Route::resource('/books', 'BookController');
Route::resource('/branches', 'BranchController');
Route::resource('/categories', 'CategoryController')->except([
    'create'
]);
Route::resource('/reservation', 'ReservationController');
Route::resource('/users', 'UserController');

Route::get('/image/{type}/{id}', 'HomeController@image')->name('image');

Route::get('test', function() {
	$item = \App\Models\Reservation::find(1);
	dd(config('services'));

	dd(microtime());
});