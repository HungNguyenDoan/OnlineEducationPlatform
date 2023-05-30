<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('homepage');
});
Route::get('/login', function () {
    return view('pages.login');
})->name('login');
Route::get('/register', function () {
    return view('pages.register');
});
Route::middleware('auth:api')->group(function () {
    Route::get('/homepage', function () {
        return view('pages.homepage');
    })->name('homepage');
    Route::get('/class-detail', function () {
        return view('pages.class_detail');
    });
});
