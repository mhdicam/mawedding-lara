<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $comment = Comment::orderBy('id')->limit(30)->get();
        $commentCount = Comment::count();

        return view('home',compact('comment', 'commentCount'));
    }
}
