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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/teller', 'TellerController@store')->name('teller');
Route::get('/profile', 'ProfileController@create')->name('profile');


Route::group(['middleware' => 'web', 'prefix' => config('backpack.base.route_prefix', ['namespace' => 'Backpack\Base\app\Http\Controllers'])], function () {
    Route::auth();
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('/', 'AdminController@redirect'); //redirects to admin dashboard
});

Route::group([ 'prefix' => config('backpack.base.route_prefix', 'admin')], function () {
    Route::group(['middleware' => ['SuperAdmin']], function () {
        CRUD::resource('message', 'Admin\MessageCrudController');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
