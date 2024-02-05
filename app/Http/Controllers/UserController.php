<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $books = BookModel::all();
        foreach ($books as $book) {
            $book->excerpt = Str::limit($book->description, 150); 
         }
        return view('User.index',[
            'books' => $books,
        ]);
    }
    public function Bookdetail(){
        return view('User.detailbook');
    }
public function contact(){
    return view('User.contact');
}
}
