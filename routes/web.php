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
    return redirect('/Biodiversidad');
});

Route::group(['prefix' => 'Biodiversidad'], function () {
    Route::get('/usuario', 'HomeController@verificar')->name('UXV');
    Route::view('/','index')->name('Bio');
   
    Auth::routes();
    Route::get('/usuario', 'HomeController@verificar')->name('UXV');
    Route::get('/Ejemplares', 'NombreEjemplarController@indexPublic')->name('EjemplaresP');
    
    Route::group(['prefix' => 'SistemaBiodiversidad', 'middleware' => 'auth'], function () {
        Route::group(['middleware' => 'TRol:Administrador'], function () {
            Route::post('/CambiaRoles', 'HomeController@editRol')->name('CambiaRol');

            Route::get('/', 'HomeController@index')->name('dashbord');
            Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/UsuariosAdmin', 'HomeController@getUsers')->name('UserAdmin');
            Route::post('/EliminarUser', 'HomeController@deleteUser')->name('EliminarUser');
            Route::get('/MisHojasCampo', 'HomeController@getHCByUser')->name('UserHC');
            
        //Route::get('/MisHojasCampo/{id}', 'PlantaController@show')->name('UserHCEdit');
            Route::get('/HojasCampo', 'PlantaController@showAllPlantas')->name('ShowHC');
            Route::get('/HojaCampo', 'PlantaController@index')->name('HojaCampo');
            Route::post('/GuardaHC', 'PlantaController@store')->name('GHC');
            Route::get('/Planta/{id}', 'PlantaController@show')->name('ShowPlanta');
            Route::get('/Ejemplares', 'NombreEjemplarController@index')->name('Ejemplares');
            Route::get('/PlantasEjemplares/{id}', 'NombreEjemplarController@show')->name('PlantasEjemplares');
            Route::get('/MisHojasCampo', 'HomeController@getHCByUser')->name('UserHC');
            Route::get('MisHojasCampo/{id}', 'PlantaController@show')->name('UserHCEdit');
            Route::post('MisHojasCampo/{id}/verificar', 'PlantaController@deleteUser')->name('VerificarHC');
           
        });

        Route::group(['middleware' => 'TRol:ConsultorT'], function () {

        });
    });
});
