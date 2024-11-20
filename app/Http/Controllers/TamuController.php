<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Undangan;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index(){
        $undangan = Undangan::all();
        $count = Undangan::count();
        
        return view('tamu.index', compact('undangan','count'));
    }

    public function create(){
        return view('tamu.create');
    }

    public function store(Request $request){
        Undangan::create([
            'nama_tamu' => $request->nama,
            'kode' => $request->kode_undangan
        ]);
        return redirect()->route('tamu.index')->with("success","berhasil tambah data");
    }

    public function show($kode){
        $undangan = Undangan::where('kode',$kode)->first();
        $comment = Comment::orderBy('id')->limit(30)->get();
        $commentCount = Comment::count();

        return view('home',compact('undangan', 'comment', 'commentCount'));
    }

    public function destroy($id)
    {
        $undangan = Undangan::findOrFail($id);
        $undangan->delete();
    
        return redirect()->route('tamu.index')->with('success', 'Undangan berhasil dihapus.');
    }
}
