<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('User.index');
    }
    public function Bookdetail(){
        return view('User.detailbook');
    }
public function contact(){
    return view('User.contact');
}
}
