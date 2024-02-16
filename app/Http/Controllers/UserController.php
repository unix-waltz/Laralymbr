<?php

namespace App\Http\Controllers;

use App\Models\BorrowModel;
use App\Models\CollectionModel;
use App\Models\ContactModel;
use App\Models\ReviewsModel;
use App\Models\User;
use App\Models\BookModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $books = BookModel::all();
        foreach ($books as $book) {
            $book->excerpt = Str::limit($book->description, 100); 
         }
        return view('User.index',[
            'books' => $books,
        ]);
    }
    public function Bookdetail(BookModel $title){
     $status = 'NOTOK';
        $bookBorrow = BorrowModel::where('book_id', $title->id)
        ->where('user_id', Auth()->user()->id)
        ->where('status', 'borrowed')
        ->first();
    if($bookBorrow){
$status = "OK";
    }
        return view('User.detailbook',[
            'title' => $title,
            'page' => $title->page = Str::limit($title->title, 14),
            "status" => $status,
            'collection' => CollectionModel::where('bookid', $title->id)
            ->where('userid',Auth()->user()->id )
            ->first(),
            'savedpost' => CollectionModel::where('bookid', $title->id),
        ]);
    }
    public function myBookdetail(BookModel $title){
        $status = 'NOTOK';
        $bookBorrow = BorrowModel::where('book_id', $title->id)
        ->where('user_id', Auth()->user()->id)
        ->where('status', 'borrowed')
        ->first();
    if($bookBorrow){
$status = "OK";
    }
        return view('User.mybookdetail',[
            'title' => $title,
            'page' => $title->page = Str::limit($title->title, 14),
            "status" => $status,
        ]);
    }

    public function myhistory(){
        return view('User.myhistory',[
            "data" => BorrowModel::where('user_id',Auth()->user()->id)->get(),
        ]);
    }
    public function myprofile(){
        return view('User.myprofile');
    }
public function contact(){
    return view('User.contact');
}
public function __contact($data){
return view('User.__contact',compact('data'));
}
public function _contact(Request $r){
ContactModel::create($r->all());
return redirect()->back()->with('success','Message sent successfully! Thank you for your feedback.');
}
public function bookbycategory(CategoryModel $category){
    foreach ($category->books as $book) {
        $book->excerpt = Str::limit($book->description, 90); 
     }
    return view('User.bookscategory',[
        'data' => $category,
    ]);
}
public function userborrow(Request $r){
    $valid = $r->validate([
        'book_id' => "required",
        'user_id' => "required",
    ]);
    $valid['borrowed_at'] = now();

    BorrowModel::create($valid);
    BookModel::find($r->book_id)->update(['status' => 'borrowed']);
    return redirect ('/');
}
public function bookreturn(Request $r){
    $valid = $r->validate([
        'book_id' => "required",
        'user_id' => "required",
    ]);
    $valid['returned_at'] = now();
    $valid['status'] = 'returned';
    $bookBorrow = BorrowModel::where('book_id', $r->book_id)
    ->where('user_id', $r->user_id)
    ->where('status', 'borrowed')
    ->first();
if($bookBorrow){
$bookBorrow->update($valid);
BookModel::find($r->book_id)->update(['status' => 'canqueued']);
return redirect()->back();
}else{
    return redirect('/404');
}
}
public function mybooks($username){
    $user = User::findOrFail(Auth()->user()->id);
    foreach ($user->borrowedBooks as $book) {
        $book->book->excerpt = Str::limit($book->book->description, 90); 
     }
    return view('User.mybooks',[
        'user' => $user,
    ]);
}
public function comment(Request $r){
   $valid = $r->validate([
"rating" => "integer|required",
"review" => "string|required",
'bookid' => "required",
'userid' => "required",
   ]);
   $valid['commented_at'] = now();
   ReviewsModel::create($valid);
   return redirect()->back();
}
public function commentdelete(ReviewsModel $id){
    $id->delete();
    return redirect()->back();
}
public function vieweditprofiler(){
    return view('User.editmyprofile',[
       'active' => 'setting',
    ]);
 }
 public function profiler(Request $r){

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
    return redirect('/myprofile/@'.Auth()->user()->username);
    }
    public function collections(Request $r){
        $valid = $r->validate([
            'bookid' => "required",
            'userid' => "required",
        ]);
        if($r->data == "NEW"){
CollectionModel::create($valid);
        }elseif($r->data == 'DEL'){
CollectionModel::find($r->collid)->delete();
        }

return redirect()->back();
    }
    public function allbooks(Request $r)
    { 
        $search = $r->input('search');
        $list = $r->input('listby');
        $rating = $r->input('rating');
        $booksQuery = BookModel::query();
        
        if (isset($search)) {
            $booksQuery->where('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orWhere('datepublished', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('publisher', 'like', '%' . $search . '%');
        }
        
        $books = $booksQuery->paginate(9);
        
        foreach ($books as $book) {
            $book->excerpt = Str::limit($book->description, 100);
        }
        
        return view('User.allbooks', [
            "books" => $books,
            "request" => $search,
            'rating' => $rating,
            'list' => $list,
        ]);
              
}}
