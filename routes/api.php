<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Usuarios\Controllers\ApiUsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::resource('/register', ApiUsuarioController::class);



Route::middleware(['auth:sanctum'])->group(function () {
    // Ruta para el cierre de sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
