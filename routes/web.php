<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebcamController;

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


Route::view('/', 'index')->name('Bio');
Route::get('/LoginInstitucional', 'HomeController@CheckLogin')->name('LInstitucional');

Auth::routes();
Auth::routes(['verify' => false]);

Route::get('/usuario', 'HomeController@verificar')->name('UXV');
Route::post('/ConvertirFoto', 'FichaTecnicaController@ConvertirFoto')->name('ConvertirFoto');

Route::get('/Ejemplares', 'NombreEjemplarController@indexPublic')->name('EjemplaresP');

Route::get('/FichaTecnica/{id}', 'FichaTecnicaController@showPublic')->name('FichaTecnicaPublica');

Route::get('/FichaTecnica/imprimir/{id}', 'FichaTecnicaController@Imprimir')->name('ImprimirFichaTecnica');

Route::post('/LoginInstitucional', 'HomeController@loginInstitucional')->name('LInstitucionalP');

Route::get('/HojaCampo/Verificadas', 'PlantaController@showVerificadas')->name('showVerificados');
Route::get('/Mapa', 'PlantaController@allPlantas')->name('Mapa');

Route::group(['prefix' => 'Sistema', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('dashbord');

    Route::get('/FichaTecnica/{id}', 'NombreEjemplarController@show')->name('PlantasEjemplares');

    Route::group(['middleware' => 'TRol:administrador'], function () {
        Route::post('/CambiaRoles', 'HomeController@editRol')->name('CambiaRol');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/UsuariosAdmin', 'HomeController@getUsers')->name('UserAdmin');
        Route::post('/EliminarUser', 'HomeController@deleteUser')->name('EliminarUser');
        Route::get('/MisHojasCampo', 'HomeController@getHCByUser')->name('UserHC');
        Route::get('/MisFichasTecnicas', 'HomeController@getFTByUser')->name('UserFT');
        Route::get('/Ejemplares', 'NombreEjemplarController@index')->name('Ejemplares');
        //Route::get('/MisHojasCampo/{id}', 'PlantaController@show')->name('UserHCEdit');
        // Route::get('/HojasCampo', 'PlantaController@showAllPlantas')->name('ShowHC');
        /*
        Route::get('/HojaCampo', 'PlantaController@index')->name('HojaCampo');
        Route::post('/GuardaHC', 'PlantaController@store')->name('GHC');
         */
        Route::get('/Planta/{id}', 'PlantaController@show')->name('ShowPlanta');
        // Route::post('MisHojasCampo/{id}/verificar', 'PlantaController@deleteUser')->name('VerificarHC');
    });

    Route::group(['middleware' => 'TRol:Gestor|administrador'], function () {
        Route::get('/FichaTecnica', 'FichaTecnicaController@index')->name('FichasT');
        Route::post('/FichaTecnica', 'FichaTecnicaController@store')->name('FichasT');
        Route::get('/HojaCampo', 'PlantaController@index')->name('HojaCampo');
        Route::post('/GuardaHC', 'PlantaController@store')->name('GHC');
        Route::get('/MisHojasCampo', 'HomeController@getHCByUser')->name('UserHC');
        Route::get('/MisFichasTecnicas', 'HomeController@getFTByUser')->name('UserFT');
        Route::get('/MisFichasTecnicas/{id}', 'FichaTecnicaController@show')->name('UserFTShow');
        Route::get('/EditarFichaT/{id}', 'FichaTecnicaController@edit')->name('UserFTEdit');
        Route::post('/EditarFichaT/{id}', 'FichaTecnicaController@update')->name('EditarFT');   
        Route::get('MisHojasCampo/{id}', 'PlantaController@show')->name('UserHCEdit');
        Route::get('/EditarHojaCampo/{id}', 'PlantaController@edit')->name('UserEHCEdit');
        Route::post('/EditarHojaCampo/{id}', 'PlantaController@update')->name('EditarHC');


    });

    Route::group(['middleware' => 'TRol:administrador|Coordinador'], function () {
        Route::get('/MisFichasTecnicas/{id}', 'FichaTecnicaController@show')->name('UserFTShow');
        Route::post('/HojasCampo/verificar', 'PlantaController@verificar')->name('VerificarHC');
        Route::post('/HojasCampo/rechazar', 'PlantaController@rechazar')->name('RechazarHC');
        Route::post('/FichasTecnicas/verificar', 'FichaTecnicaController@verificar')->name('VerificarFT');
        Route::post('/FichasTecnicas/rechazar', 'FichaTecnicaController@rechazar')->name('RechazarFT');
        Route::get('/HojasCampo', 'PlantaController@showAllPlantas')->name('ShowHC');
        Route::get('/FichasTecnicas', 'FichaTecnicaController@showAllFichasT')->name('ShowAllFT');

    });
});

Route::get('/welcome', [WebcamController::class, 'index']);
Route::post('webcam-capture', [WebcamController::class, 'store'])->name('webcam.capture');
//Route::get('/abrirCamara', 'CamaraController@abrirCamara')->name('abrirCamara');
