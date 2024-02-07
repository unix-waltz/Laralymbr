<?php

namespace App\Http\Controllers;

use App\Models\BorrowModel;
use App\Models\User;
use App\Models\BookModel;
use Illuminate\Support\Str;
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
        return view('User.detailbook',[
            'title' => $title,
            'page' => $title->page = Str::limit($title->title, 14),
        ]);
    }
    public function myBookdetail(BookModel $title){
        return view('User.mybookdetail',[
            'title' => $title,
            'page' => $title->page = Str::limit($title->title, 14),
        ]);
    }
public function contact(){
    return view('User.contact');
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
public function mybooks($username){
    $user = User::findOrFail(Auth()->user()->id);
    foreach ($user->borrowedBooks as $book) {
        $book->book->excerpt = Str::limit($book->book->description, 90); 
     }
    return view('User.mybooks',[
        'user' => $user,
    ]);
}
}
