<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\BookModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function dashboard(){
    return view('Admin.index',['active' => "dashboard"]);
   }
   public function bookview(){
      $books = BookModel::all();
      $totalBooks = $books->count();
      $totalBorrowedBooks = $books->where('status', 'borrowed')->count();
      $totalQueuedBooks = $books->where('status', 'canqueued')->count();
      foreach ($books as $book) {
         $book->excerpt = Str::limit($book->description, 150); 
      }
      return view('Admin.bookpage',[
         'active' => "book",
      "books" => $books,
      'totalbooks' => $totalBooks,
      'borrowedbooks' => $totalBorrowedBooks,
      'canqueuedbooks' => $totalQueuedBooks,
      ]);
     }
     public function newbookview(){
      $category = CategoryModel::all();
      return view('Admin.formBook',[
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
return redirect('/admin/dashboard/bookpage');
     }
     public function viewformupdatebook($id){
      $model = BookModel::find($id);
      if($model){

         return view('Admin.formbookupdate');
      }
      return redirect('/404');
     }
     public function viewdetailbook($id){
      $model = BookModel::find($id);
      if($model){

         return view('Admin.detailbook',[
            'active' => 'book',
            'book' => $model,
         ]);
      }
      return redirect('/404');
     }
}
