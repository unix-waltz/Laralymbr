<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

// authorization routes
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');
Route::get('/register',[AuthController::class,'index'])->middleware('guest');
Route::post('/register',[AuthController::class,'register']);
Route::get('/login',[AuthController::class,'LoginView'])->middleware('guest')->name('login');
Route::post('/login',[AuthController::class,'Login']);


Route::middleware(['auth', 'useRole:USER'])->group(function () {
    Route::get('/contact',[UserController::class,'contact']);
    Route::get('/',[UserController::class,'index']);
    Route::get('/product/book/detail/{id}',[UserController::class,'Bookdetail']);
});

Route::middleware(['auth', 'useRole:ADMIN'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/dashboard/bookpage',[AdminController::class,'bookview']);
    
});

Route::middleware(['auth', 'useRole:OFFICER'])->group(function () {
    Route::get('/petugas/dashboard', 'PetugasController@dashboard');
});


Route::fallback(function(){
    return view('errors.404');
});