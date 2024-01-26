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
Route::get('/home',function(){
return 'ini home';
});
Route::get('/product/book/detail/{id}',[BookController::class,'Bookdetail'])->middleware('auth')->middleware('useUser');
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');
Route::get('/',[BookController::class,'index'])->middleware('auth');
Route::get('/register',[AuthController::class,'index'])->middleware('guest');
Route::post('/register',[AuthController::class,'register']);
Route::get('/login',[AuthController::class,'LoginView'])->middleware('guest')->name('login');
Route::post('/login',[AuthController::class,'Login']);
Route::get('/contact',[BookController::class,'contact'])->middleware('auth');





Route::fallback(function(){
    return view('errors.404');
});