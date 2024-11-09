<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
        // store
        public function store(Request $request) {
            $request->validate([
                'nama' => 'required',
                'komentar' => 'required'
            ]);
        
            try {
                $comment = Comment::create([
                    'nama' => $request->nama,
                    'komentar' => $request->komentar
                ]);
        
                if ($request->ajax()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Komentar berhasil ditambahkan',
                        'comment' => $comment
                    ]);
                }
        
                return redirect()->route('home')->with("success", "berhasil tambah komentar");
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        }
        

}
