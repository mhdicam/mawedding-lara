<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // store
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'komentar' => 'required'
        ]);

  try {
            Comment::create([
                'nama' => $request->nama,
                'komentar' => $request->komentar
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('home')->with('error',$e->getMessage());
        }
        return response()->json(['success' => 'Komentar berhasil ditambahkan']);
    }
}
