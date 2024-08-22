<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; // ここで名前空間をインポート

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

// Task API Routes
Route::get('/v1/tasks', [TaskController::class, 'index']);
Route::post('/v1/tasks', [TaskController::class, 'store']);
Route::get('/v1/tasks/{id}', [TaskController::class, 'show']);
Route::put('/v1/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/v1/tasks/{id}', [TaskController::class, 'destroy']);
