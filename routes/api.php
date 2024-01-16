<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitacorasController;
use App\Http\Controllers\EnlacesController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\Api\ApiController;  // Added a semicolon here

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API Routes
Route::post("register", [ApiController::class, "register"]);
Route::post("login", [ApiController::class, "login"]);

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('profile', [ApiController::class, 'profile']);
    Route::get('all', [ApiController::class, 'allUsers']);
    Route::get('refresh', [ApiController::class, 'refreshToken']);
    Route::get('logout', [ApiController::class, 'logout']);
});

Route::get('/bitacoras', [BitacorasController::class, 'index']);
Route::get('/bitacoras/{id}', [BitacorasController::class, 'show']);
Route::post('/bitacoras', [BitacorasController::class, 'store']);
Route::put('/bitacoras/{id}', [BitacorasController::class, 'update']);
Route::delete('/bitacoras/{id}', [BitacorasController::class, 'destroy']);

Route::get('/enlaces', [EnlacesController::class, 'index']);
Route::get('/enlaces/{id}', [EnlacesController::class, 'show']);
Route::post('/enlaces', [EnlacesController::class, 'store']);
Route::put('/enlaces/{id}', [EnlacesController::class, 'update']);
Route::delete('/enlaces/{id}', [EnlacesController::class, 'destroy']);

Route::get('/paginas', [PaginasController::class, 'index']);
Route::get('/paginas/{id}', [PaginasController::class, 'show']);
Route::post('/paginas', [PaginasController::class, 'store']);
Route::put('/paginas/{id}', [PaginasController::class, 'update']);
Route::delete('/paginas/{id}', [PaginasController::class, 'destroy']);

Route::get('/personas', [PersonasController::class, 'index']);
Route::get('/personas/{id}', [PersonasController::class, 'show']);
Route::post('/personas', [PersonasController::class, 'store']);
Route::put('/personas/{id}', [PersonasController::class, 'update']);
Route::delete('/personas/{id}', [PersonasController::class, 'destroy']);

Route::get('/roles', [RolesController::class, 'index']);
Route::get('/roles/{id}', [RolesController::class, 'show']);
Route::post('/roles', [RolesController::class, 'store']);
Route::put('/roles/{id}', [RolesController::class, 'update']);
Route::delete('/roles/{id}', [RolesController::class, 'destroy']);

Route::get('/usuarios', [UsuariosController::class, 'index']);
Route::get('/usuarios/{id}', [UsuariosController::class, 'show']);
Route::post('/usuarios', [UsuariosController::class, 'store']);
Route::put('/usuarios/{id}', [UsuariosController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy']);
