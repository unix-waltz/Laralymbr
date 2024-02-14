<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficerController;


// authorization routes
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/register', [AuthController::class, 'index'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'LoginView'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'Login']);


Route::middleware(['auth', 'useRole:USER'])->group(function () {
    Route::post('/user/borrow', [UserController::class, 'userborrow']);
    Route::get('/contact', [UserController::class, 'contact']);
    Route::get('/', [UserController::class, 'index']);
    Route::get('/product/book/detail/{title:title}', [UserController::class, 'Bookdetail']);
    Route::get('/user/category/{category:category_name}', [UserController::class, 'bookbycategory']);
    Route::get('/mybooks/{username}', [UserController::class, 'mybooks']);
    Route::get('/mybook/detail/{title:title}', [UserController::class, 'myBookdetail']);
    Route::post('/user/comment', [UserController::class, 'comment']);
    Route::get('/user/comment/delete/{id:id}', [UserController::class, 'commentdelete']);
    Route::get('/user/myhistory/{username}', [UserController::class, 'myhistory']);
    Route::get('/user/profile/setting/edit', [UserController::class, 'vieweditprofiler']);
    Route::get('/myprofile/{username}', [UserController::class, 'myprofile']);
    Route::post('/user/return', [UserController::class, 'bookreturn']);
   Route::post('/user/collection', [UserController::class, 'collections']);
    Route::post('/user/profile/setting', [UserController::class, 'profiler']);
    Route::get('/all-books',[UserController::class, 'allbooks']);
});

Route::middleware(['auth', 'useRole:ADMIN'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/dashboard/bookpage', [AdminController::class, 'bookview']);
    Route::get('/admin/dashboard/book/new', [AdminController::class, 'newbookview']);
    Route::post('/new/book', [AdminController::class, 'booknew']);
    Route::get('/admin/book/detail/{id}', [AdminController::class, 'viewdetailbook']);
    Route::get('/admin/book/update/{id}', [AdminController::class, 'viewformupdatebook']);
    Route::post('/admin/book/update', [AdminController::class, 'formupdatebook']);
    Route::get('/admin/book/delete/{id}', [AdminController::class, 'deletebook']);
    Route::get('/admin/book/category/{category:category_name}', [AdminController::class, 'viewcategorybooks']);
    Route::post('/admin/book/category/new', [AdminController::class, 'newcategory']);
    Route::get('/admin/category/delete/{category}', [AdminController::class, 'categorydelete']);
    Route::get('/admin/category/update/{id}', [AdminController::class, 'viewcategoryedit']);
    Route::post('/admin/category/update/', [AdminController::class, 'categoryedit']);
    Route::get('/admin/report/pdf', [AdminController::class, 'reportpdf']);
    Route::get('/admin/dashboard/account', [AdminController::class, 'accounts']);
    Route::get('/admin/dashboard/account/alluser', [AdminController::class, 'accountusers']);
    Route::post('/admin/office/register', [AdminController::class, 'officeregister']);
    Route::post('/admin/office/register/edit', [AdminController::class, 'officeregisteredit']);
    Route::get('/admin/office/un/{id}', [AdminController::class, 'unofficer']);
    Route::get('/admin/user/register/del/{id}', [AdminController::class, 'deleteuser']);
    Route::get('/admin/dashboard/setting', [AdminController::class, 'setting']);
    Route::get('/admin/dashboard/setting/edit', [AdminController::class, 'viewprofiler']);
    Route::post('/admin/dashboard/setting', [AdminController::class, 'profiler']);
    Route::get('/admin/search', [AdminController::class, 'search']);
});

Route::middleware(['auth', 'useRole:OFFICER'])->group(function () {
    Route::get('/officer/dashboard', [OfficerController::class, 'dashboard']);
    Route::get('/officer/dashboard/bookpage', [OfficerController::class, 'bookview']);
    Route::get('/officer/dashboard/book/new', [OfficerController::class, 'newbookview']);
    Route::post('/officer/new/book', [OfficerController::class, 'booknew']);
    Route::get('/officer/book/detail/{id}', [OfficerController::class, 'viewdetailbook']);
    Route::get('/officer/book/update/{id}', [OfficerController::class, 'viewformupdatebook']);
    Route::post('/officer/book/update', [OfficerController::class, 'formupdatebook']);
    Route::get('/officer/book/delete/{id}', [OfficerController::class, 'deletebook']);
    Route::get('/officer/book/category/{category:category_name}', [OfficerController::class, 'viewcategorybooks']);
    Route::post('/officer/book/category/new', [OfficerController::class, 'newcategory']);
    Route::get('/officer/category/delete/{category}', [OfficerController::class, 'categorydelete']);
    Route::get('/officer/category/update/{id}', [OfficerController::class, 'viewcategoryedit']);
    Route::post('/officer/category/update/', [OfficerController::class, 'categoryedit']);
    Route::get('/officer/report/pdf', [OfficerController::class, 'reportpdf']);
    Route::get('/officer/dashboard/account', [OfficerController::class, 'accounts']);
    Route::get('/officer/dashboard/account/alluser', [OfficerController::class, 'accountusers']);
    Route::post('/officer/office/register', [OfficerController::class, 'officeregister']);
    Route::post('/officer/office/register/edit', [OfficerController::class, 'officeregisteredit']);
    Route::get('/officer/office/un/{id}', [OfficerController::class, 'unofficer']);
    Route::get('/officer/user/register/del/{id}', [OfficerController::class, 'deleteuser']);
    Route::get('/officer/dashboard/setting', [OfficerController::class, 'setting']);
    Route::get('/officer/dashboard/setting/edit', [OfficerController::class, 'viewprofiler']);
    Route::post('/officer/dashboard/setting', [OfficerController::class, 'profiler']);
    Route::get('/officer/search', [OfficerController::class, 'search']);
});


Route::fallback(function () {
    return view('errors.404');
});