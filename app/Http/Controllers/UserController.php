<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
}
