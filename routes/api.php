<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PassportAuthController;

use App\Http\Controllers\PublicadorController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\TerritorioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ROTAS DA API PARA PUBLICADOR
Route::get('publicador', [PublicadorController::class, 'getAllPublicador']);
Route::get('publicador/{id}', [PublicadorController::class, 'getPublicador']);
Route::post('publicador', [PublicadorController::class, 'createPublicador']);
Route::put('publicador/{id}', [PublicadorController::class, 'updatePublicador']);
Route::delete('publicador/{id}', [PublicadorController::class, 'deletePublicador']);

//ROTAS DA API PARA GRUPO
Route::get('grupo', [GrupoController::class, 'getAllGrupo']);
Route::get('grupo/{id}', [GrupoController::class, 'getGrupo']);
Route::post('grupo', [GrupoController::class, 'createGrupo']);
Route::put('grupo/{id}', [GrupoController::class, 'updateGrupo']);
Route::delete('grupo/{id}', [GrupoController::class, 'deleteGrupo']);

//ROTAS DA API PARA TERRITORIO
Route::get('territorio', [TerritorioController::class, 'getAllTerritorio']);
Route::get('territorio/{id}', [TerritorioController::class, 'getTerritorio']);
Route::post('territorio', [TerritorioController::class, 'createTerritorio']);
Route::put('territorio/{id}', [TerritorioController::class, 'updateTerritorio']);
Route::delete('territorio/{id}', [TerritorioController::class, 'deleteTerritorio']);

//ROTAS DA API PARA AUTH
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::post('/forgot-password', [PassportAuthController::class, 'forgot_password'])->middleware('guest');

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);
});
