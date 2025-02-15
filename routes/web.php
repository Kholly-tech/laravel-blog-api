<?php

use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/v1

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::group(['prefix' => 'api/v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::apiResource('blogs', BlogController::class);
    Route::apiResource('users', UserController::class);
});
