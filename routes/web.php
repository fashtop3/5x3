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

Route::get('/how', function (){
    return view('how');
});

Route::get('/faq', function (){
    return view('faq');
});

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/teller', 'TellerController@store')->name('teller');
Route::get('/profile', 'ProfileController@create')->name('profile');
Route::post('/profile', 'ProfileController@store')->name('profile');


/**
 * backpack configs
 */

Route::group(['middleware' => ['web'], 'prefix' => config('backpack.base.route_prefix', ['namespace' => 'Backpack\Base\app\Http\Controllers'])], function () {
    Route::auth();
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('/', 'AdminController@redirect'); //redirects to admin dashboard
});

/**
 * backpack configs
 */
Route::group(['prefix' => config('backpack.base.route_prefix', 'admin')], function () {
    CRUD::resource('receipt', 'Admin\ReceiptCrudController');
    Route::get('receipt/{id}', function() {

    })->name('receipt.view');
    CRUD::resource('message', 'Admin\MessageCrudController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
