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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('establecer-contraseña', 'Admin\UserController@viewPassword')->name('viewPassword');
Route::post('setPassword', 'Admin\UserController@setPassword')->name('setPassword');

Route::group(['middleware' => 'auth'], function () {

	//Usuarios
	Route::resource('users', 'Admin\UserController');

	//Clientes
	Route::resource('clients', 'Admin\ClientController');

	//Ciudades
	Route::resource('cities', 'Admin\CityController');
	
	Route::get('email', function () {
			return view('mails.complete-register');
	});
});

