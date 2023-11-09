<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ajaxdistritos', 'App\Http\Controllers\AjaxController@distritos')->name('ajaxdistritos');
Route::get('/ajaxprovincias', 'App\Http\Controllers\AjaxController@provincias')->name('ajaxprovincias');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/arbitros', App\Http\Controllers\ArbitroController::class)->names('arbitros');

    Route::resource('/empresas', App\Http\Controllers\EmpresaController::class)->names('empresas');
    Route::resource('/personas', App\Http\Controllers\PersonaController::class)->names('personas');

    Route::resource('/procesos', App\Http\Controllers\ProcesoController::class)->names('procesos');
    Route::post('/procesos/autocomplete', [App\Http\Controllers\ProcesoController::class, 'autocomplete'])->name('autocomplete');
    Route::resource('/arbitroregistro', App\Http\Controllers\ArbitroRegistroController::class)->names('arbitroregistro');

    Route::resource('/demandantes', App\Http\Controllers\DemandanteController::class)->names('demandante');
    Route::resource('/demandados', App\Http\Controllers\DemandadoController::class)->names('demandado');
    
    Route::resource('/etapas', App\Http\Controllers\EtapasController::class)->names('etapas');
    Route::resource('/tribunals', App\Http\Controllers\TribunalController::class)->names('tribunals');
    Route::resource('/procesales', App\Http\Controllers\ProcesalController::class)->names('procesales');
    Route::resource('/respuestas', App\Http\Controllers\RespuestaController::class)->names('respuestas');
});
