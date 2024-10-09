<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

// Müşteriler için API kaynağı rotaları
Route::apiResource('customers', CustomerController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

// Varsayılan kullanıcı kimlik doğrulama route'u (Değişmeden kalabilir)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
