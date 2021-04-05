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
    return redirect()->route('login');
});
Route::get('/usuario', function () {
    return ("usuario por verificar");
});

Route::group(['prefix' => 'Biodiversidad', 'middleware' => 'auth'], function () {
    Route::group(['middleware' => 'TRol:Administrador'], function () {

        Route::get('/', 'HomeController@index')->name('dashbord');
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/HojaCampo', 'PlantaController@index')->name('HojaCampo');
        Route::post('/GuardaHC', 'PlantaController@store')->name('GHC');
        Route::get('/Planta/{id}', 'PlantaController@show')->name('ShowPlanta');
        Route::get('/Ejemplares', 'NombreEjemplarController@index')->name('Ejemplares');
        Route::get('/PlantasEjemplares/{id}', 'NombreEjemplarController@show')->name('PlantasEjemplares');

        Route::get('/UsuariosAdmin', 'HomeController@getUsers')->name('UserAdmin');
    });

    Route::group(['middleware' => 'TRol:ConsultorT'], function () {
       
    });
});
Auth::routes();
