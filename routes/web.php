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
    Route::get('/admin/dashboard/book/new',[AdminController::class,'newbookview']);
    Route::post('/new/book',[AdminController::class,'booknew']);
    Route::get('/admin/book/detail/{id}',[AdminController::class,'viewdetailbook']);
    Route::get('/admin/book/update/{id}',[AdminController::class,'viewformupdatebook']);
    Route::post('/admin/book/update',[AdminController::class,'formupdatebook']);
    Route::get('/admin/book/delete/{id}',[AdminController::class,'deletebook']);
    Route::get('/admin/book/category/{category:category_name}',[AdminController::class,'viewcategorybooks']);
    Route::post('/admin/book/category/new',[AdminController::class,'newcategory']);
    Route::get('/admin/category/delete/{category}',[AdminController::class,'categorydelete']);
    Route::get('/admin/category/update/{id}',[AdminController::class,'viewcategoryedit']);
    Route::post('/admin/category/update/',[AdminController::class,'categoryedit']);
    Route::get('/admin/report/pdf',[AdminController::class,'reportpdf']);
    Route::get('/admin/dashboard/account',[AdminController::class,'accounts']);
    Route::get('/admin/dashboard/account/alluser',[AdminController::class,'accountusers']);
    Route::post('/admin/office/register',[AdminController::class,'officeregister']);
    Route::post('/admin/office/register/edit',[AdminController::class,'officeregisteredit']);
    Route::get('/admin/office/un/{id}',[AdminController::class,'unofficer']);
    Route::get('/admin/user/register/del/{id}',[AdminController::class,'deleteuser']);
});

Route::middleware(['auth', 'useRole:OFFICER'])->group(function () {
    Route::get('/petugas/dashboard', 'PetugasController@dashboard');
});


Route::fallback(function(){
    return view('errors.404');
});