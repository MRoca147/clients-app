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

Route::group(['middleware' => 'auth'], function () {
	// Route::get('clientes', function () {
	// 	return view('pages.clients');
	// })->name('clients');

	// Route::get('ciudades', function () {
	// 	return view('pages.cities');
	// })->name('cities');

	// Route::get('usuarios', function () {
	// 	return view('pages.users');
	// })->name('users');

	//Usuarios
	Route::resource('users', 'Admin\UserController');

	//Clientes
	Route::resource('clients', 'Admin\ClientController');

	//Ciudades
	Route::resource('cities', 'Admin\CityController');
});

