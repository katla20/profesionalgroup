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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//Route Hooks - Do not delete//
	Route::view('authorizations', 'livewire.authorizations.index')->middleware('auth');
	Route::view('clients', 'livewire.clients.index')->middleware('auth');

	Route::get('/registration', function () {
		return view('welcome');
	});

	Route::resource('clients_', App\Http\Livewire\Clients::class)->middleware('auth');
	

	Route::get('/registration', function () {
		return view('livewire.registration-test');
	});

	Route::controller(App\Http\Livewire\Authorizations::class)->group(function () {
		Route::post('authorizations_/save', 'save')->name('authorizations_.save');
		Route::get('authorizations_/pdf/{authorizations_}', 'pdf')->name('authorizations_.pdf');
	});

	Route::resource('authorizations_', App\Http\Livewire\Authorizations::class)->middleware('auth');