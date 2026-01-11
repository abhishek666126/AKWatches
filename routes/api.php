<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\Api\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('signup', [BackendController::class, 'signupstore']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/categories', [CategoryController::class, 'categorylist']);
    Route::post('admin/login', [BackendController::class, 'loginstore']);
});


// Route::middleware('throttle:60,1')->group(function () {
//     Route::post('/login', [AuthController::class, 'login']);
// });