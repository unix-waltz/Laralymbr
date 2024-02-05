<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\BookModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class OfficerController extends Controller
{
   public function dashboard(){
    return view('Officer.index',[
      'active' => "dashboard",
      'nbook' => BookModel::all()->where('status', 'borrowed')->count(),
      'okbook'  => BookModel::all()->where('status', 'canqueued')->count(),
      'book' => BookModel::all()->count(),
      'user' => User::all()->count(),
   ]);
   }
   public function bookview(){
      $books = BookModel::all();
      $category = CategoryModel::all();
      $totalBooks = $books->count();
      $totalBorrowedBooks = $books->where('status', 'borrowed')->count();
      $totalQueuedBooks = $books->where('status', 'canqueued')->count();
      foreach ($books as $book) {
         $book->excerpt = Str::limit($book->description, 150); 
      }
      return view('Officer.bookpage',[
         'active' => "book",
      "books" => $books,
      'totalbooks' => $totalBooks,
      'borrowedbooks' => $totalBorrowedBooks,
      'canqueuedbooks' => $totalQueuedBooks,
      'category' => $category,
      ]);
     }
     public function newbookview(){
      $category = CategoryModel::all();
      return view('Officer.formBook',[
         'active' => "book",
         'category' => $category,
      ]);
     }
     public function booknew(Request $r){ 
$valid =  $r->validate([
   "title" => "string|required",
   "author" => "string|required|unique:books",
   "publisher" => "string|required",
   "category_id" => "required",
   "datepublished" => "string|required",
   "description" => "string|required",
   'thumbnail' => "image|nullable:unique:books"
]);
if($r->file('thumbnail')){
$valid['thumbnail'] = $r->file('thumbnail')->store('thumbnail');
}
BookModel::create($valid);
return redirect('/officer/dashboard/bookpage');
     }

     public function viewformupdatebook($id){
      $model = BookModel::find($id);
      if($model){

         return view('Officer.formbookupdate',[
            'active' => 'book',
            'book' => $model,
            'category' => $category = CategoryModel::all(),
         ]);
      }
      return redirect('/404');
     }
public function formupdatebook(Request $r){
   $model = BookModel::find($r->id);
      if($model){
         $valid =  $r->validate([
            "title" => "string|required",
            "author" => "string|required",
            "publisher" => "string|required",
            "category_id" => "required",
            "datepublished" => "string|required",
            "description" => "string|required",
            'thumbnail' => "image|nullable:unique:books"
         ]);
         if($r->file('thumbnail')){
            if($r->oldthumb){
               Storage::delete($r->oldthumb);
            }
         $valid['thumbnail'] = $r->file('thumbnail')->store('thumbnail');
         }
         $model->update($valid);
         return redirect('/Officer/book/detail/'.$r->id);
      }
}

     public function viewdetailbook($id){
      $model = BookModel::find($id);
      if($model){

         return view('Officer.detailbook',[
            'active' => 'book',
            'book' => $model,
         ]);
      }
      return redirect('/404');
     }
     public function deletebook($id)
     {
      $model = BookModel::find($id);
      if($model){
         if($model->thumbnail){
             Storage::delete($model->thumbnail);
         }
        
$model->delete();
return redirect('/officer/dashboard/bookpage');
      }
      return redirect('/404');
     }
     public function viewcategorybooks(CategoryModel $category){
      return view('Officer.bookscategory',[
         "active" => "book",
         'data' => $category,
      ]);
     }
     public function newcategory(Request $r){
$valid = $r->validate([
'category_name' => 'string|required|unique:categories|regex:/^\S*$/u',
]);
CategoryModel::create($valid);
return redirect('/officer/dashboard/bookpage');
     }
     public function categorydelete(CategoryModel $category){
$category->delete();
      return redirect('/officer/dashboard/bookpage');
     }
     public function viewcategoryedit(CategoryModel $id){
return view('Officer.categoryedit',[
   'active' => 'book',
   'data' => $id
]);
     }
     public function categoryedit(Request $r){

      $valid = $r->validate([
'category_name'=> 'required|unique:categories|regex:/^\S*$/u',
      ]);
      $model = CategoryModel::find($r->id);
      $model->update($valid);
      return redirect('/Officer/book/category/'.$valid['category_name']);
     }
     public function reportpdf(){
      $data = [
         'book' => BookModel::all()->count(),
         'category' => CategoryModel::all()->count(),
         'user' => User::all()->where('role', 'USER')->count(),
         'by' => 'Officer',
         'totalBorrowedBooks' => BookModel::all()->where('status', 'borrowed')->count(),
         'totalQueuedBooks' => BookModel::all()->where('status', 'canqueued')->count(),
      ];
      $pdf = Pdf::loadView('Officer.pdf-report', $data);
    return $pdf->download(now()->format('Y-m-d').' -Officer-report.pdf');
     }
     public function accounts(){
      return view('Officer.accounts',[
         'active' =>'accounts',
         'users' => User::all()->where('role', 'USER')->count(),
         'officer' => User::all()->where('role', 'OFFICER'),
      ]);
     }
     public function accountusers(){
      return view('Officer.accountusers',[
         'active' =>'accounts',
         'users' => User::all()->where('role', 'USER'),
      ]);
     }
     public function officeregister(Request $request){
       
      $valid = $request->validate([
          'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^\S*$/u'],
          "fullname" => 'nullable|string',
          "address" => 'nullable|string',
          "password" => 'required|string|min:6',
          "email" => 'required|unique:users',
      

      ]);
      $valid['password'] = bcrypt($valid['password']); 
      $valid['role'] = 'OFFICER';
      User::create($valid);
      return redirect('/Officer/dashboard/account');
  }
  public function officeregisteredit(Request $request){
       
   $valid = $request->validate([
       'username' => ['required', 'string', 'max:255', 'regex:/^\S*$/u'],
       "fullname" => 'nullable|string',
       "address" => 'nullable|string',
       "email" => 'required',
   

   ]);
   if($request->password){
     $valid['password'] = bcrypt($request->password);  
   }
   
   $valid['role'] = 'OFFICER';
  $model = User::find($request->key);
  $model->update($valid);
   return redirect('/Officer/dashboard/account');
}
public function unofficer(User $id){
$id->update(['role'=> 'USER']);
return redirect('/Officer/dashboard/account');
}
public function deleteuser(User $id){
   $id->delete();
   return redirect('/Officer/dashboard/account/alluser');
}
public function setting(){
   return view('Officer.setting',[
      'active' => 'setting',
      
   ]);
}
public function profiler(Request $r){
   // @dd($r->file('profilephoto'));

$valid = $r->validate([
   'username' => 'required|regex:/^\S*$/u',
   'fullname' => 'required',
    'email' => 'email',
    'address' => 'nullable|string',
    'profilephoto' => 'nullable|image',
]);
if($r->file('profilephoto')){
   if($r->oldphoto){
      Storage::delete(Auth()->user()->profilephoto);
   }
   $valid['profilephoto'] = $r->file('profilephoto')->store('profilephoto');
}
$model = User::find(Auth()->user()->id);
$model->update($valid);
return redirect('/Officer/dashboard/setting');
}
public function viewprofiler(){
   return view('Officer.profileEdit',[
      'active' => 'setting',
   ]);
}
public function search(Request $r){
   $search = $r->input('search');

   $results = BookModel::where('title', 'like', '%' . $search . '%')
       ->orWhere('author', 'like', '%' . $search . '%')
       ->orWhere('datepublished', 'like', '%' . $search . '%')
       ->orWhere('description', 'like', '%' . $search . '%')
       ->orWhere('status', 'like', '%' . $search . '%')
       ->orWhere('publisher', 'like', '%' . $search . '%')
       ->get();
return view('Officer.search',[
   "results" => $results,
   "active" => 'book',
   "search" => $search,
]);
}
}
