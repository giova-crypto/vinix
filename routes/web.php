<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

use App\Models\Pet;
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
Route::get('pets/status/{status}', 'App\Http\Controllers\FunctionsController@show')->name('pets.status.show');
Route::get('pets/category/{category}', 'App\Http\Controllers\CategoriesController@show')->name('categories.show');
Route::resource('api', 'App\Http\Controllers\ApiController');
Route::resource('pets', 'App\Http\Controllers\PetsController');
