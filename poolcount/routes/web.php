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
use App\Http\Controllers\Piscina;
use App\Http\Controllers\PiscinaController;

Route::get('/', [PiscinaController::class, 'index']);

Route::post('/logout', [PiscinaController::class, 'index']);

Route::get("/cadastro", [PiscinaController::class, 'cadastro'])->middleware('auth');

Route::get('/dashboard', [PiscinaController::class, 'dashboard'])->middleware("auth");

Route::get("/piscinas", [PiscinaController::class, 'piscinas'])->middleware("auth");

Route::get("/piscinas/detalhes/{id}", [PiscinaController::class, "detalhes"])->middleware("auth");

Route::post('/cadastrado', [PiscinaController::class, 'cadastrado'])->middleware('auth');

Route::delete('/remover/{id}', [PiscinaController::class, 'destroy'])->middleware('auth');

Route::get('/editar/{id}', [PiscinaController::class, 'edit'])->middleware('auth');

Route::put("/piscina/update/{id}", [PiscinaController::class, 'update'])->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [PiscinaController::class, 'dashboard']);
});
