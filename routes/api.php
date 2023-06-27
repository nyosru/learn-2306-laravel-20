<?php

use App\Http\Controllers\Api\GoodController ;
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

//Route::middleware('auth:sanctum')->apiResource('good', GoodController::class );
//Route::middleware('auth:api')->apiResource('good', GoodController::class );
Route::apiResource('good', GoodController::class )
    ->middleware('auth_api')
;

