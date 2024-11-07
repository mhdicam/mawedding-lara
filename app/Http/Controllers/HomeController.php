<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $comment = Comment::all();
        $countcomment = Comment::count();
        return view('home',compact('comment','countcomment'));
    }
}
