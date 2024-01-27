<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function dashboard(){
    return view('Admin.index',['active' => "dashboard"]);
   }
   public function bookview(){
      return view('Admin.bookpage',['active' => "book"]);
     }
}
