<?php

use App\Http\Controllers\Api\InitiativeController;
use App\Http\Controllers\Api\PracticeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/practices', [PracticeController::class, 'index']);

Route::get('/initiatives', [InitiativeController::class, 'index']);
Route::get('/initiative/{initiative}', [InitiativeController::class, 'show']);
Route::post('/initiatives/{initiative}', [InitiativeController::class, 'store']);

Route::post('/initiative/{initiative}/goal-team', [PracticeController::class, 'store']);
