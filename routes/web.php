<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

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
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/',[BookController::class,'index'])->middleware('auth');
Route::get('/register',[AuthController::class,'index']);
Route::post('/register',[AuthController::class,'register']);
Route::get('/login',[AuthController::class,'LoginView'])->name('login');
Route::post('/login',[AuthController::class,'Login']);