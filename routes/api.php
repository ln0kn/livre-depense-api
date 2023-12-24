<?php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ChargeFixeController;
use App\Http\Controllers\Api\V1\ConstanteController;
use App\Http\Controllers\Api\V1\DepenseController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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






Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('article', ArticleController::class);
    Route::apiResource('constante', ConstanteController::class);
    Route::apiResource('charge', ChargeFixeController::class);
    Route::apiResource('depense', DepenseController::class);

    Route::post('depense/bulk', [DepenseController::class, 'bulkStore']);
});
