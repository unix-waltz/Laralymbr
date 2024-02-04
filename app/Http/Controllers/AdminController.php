<?php

namespace App\Http\Controllers;
use App\Models\BookModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
   public function dashboard(){
    return view('Admin.index',['active' => "dashboard"]);
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
      return view('Admin.bookpage',[
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

         return view('Admin.formbookupdate',[
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
         return redirect('/admin/book/detail/'.$r->id);
      }
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
     public function deletebook($id)
     {
      $model = BookModel::find($id);
      if($model){
$model->delete();
return redirect('/admin/dashboard/bookpage');
      }
      return redirect('/404');
     }
     public function viewcategorybooks(CategoryModel $category){
      return view('Admin.bookscategory',[
         "active" => "book",
         'data' => $category,
      ]);
     }
     public function newcategory(Request $r){
$valid = $r->validate([
'category_name' => 'string|required|unique:categories|regex:/^\S*$/u',
]);
CategoryModel::create($valid);
return redirect('/admin/dashboard/bookpage');
     }
     public function categorydelete(CategoryModel $category){
$category->delete();
      return redirect('/admin/dashboard/bookpage');
     }
}
