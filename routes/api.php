<?php

use App\Http\Controllers\API\DataDiriController;
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

Route::get('data-diri', [DataDiriController::class, 'index']);
Route::post('data-diri/store', [DataDiriController::class, 'store']);
Route::get('data-diri/show/{id}', [DataDiriController::class, 'show']);
Route::post('data-diri/update/{id}', [DataDiriController::class, 'update']);
Route::delete('data-diri/delete/{id}', [DataDiriController::class, 'destroy']);
Route::put('data-diri/restore/{id}', [DataDiriController::class, 'restore']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
