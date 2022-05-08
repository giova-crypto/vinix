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

Route::get('/', 'App\Http\Controllers\PetsController@home')->name('/');
Route::get('pet/create', 'App\Http\Controllers\PetsController@create')->name('/pet/create');
Route::post('pet/store', 'App\Http\Controllers\PetsController@store')->name('/pet/store');

/*Route::get('pets', function () {
    return App\Models\Pet::all();
});
*/