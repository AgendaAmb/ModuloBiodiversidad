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
    return redirect()->route('HojaCampo');
});

Auth::routes();

Route::get('/HojaCampo', 'PlantaController@index')->name('HojaCampo');
Route::post('/GuardaHC', 'PlantaController@store')->name('GHC');
Route::get('/Ejemplares', 'NombreEjemplarController@index')->name('Ejemplares');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/Panel', function () {
    return view("Panel");
});

