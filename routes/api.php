<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::prefix('/class')->group(function () {
        // Route::get('/all-class', function () {
        //     return 1;
        // });
        Route::get('/all-class', [ClassController::class, 'getAllClass']);
        Route::get('/{id}', [ClassController::class, 'getDetailClass']);
        Route::post('/create', [ClassController::class, 'createClass']);
        Route::post('/join', [ClassController::class, 'joinClass']);
    });
    Route::prefix('/lesson')->group(function () {
        Route::get('/all', [LessonController::class, 'getAllLessonInClass']);
        Route::post('/create', [LessonController::class, '']);
        Route::get('/{id}');
        Route::put('/{id}');
    });
});
