<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kategoribukurelasi;


class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('buku.kategori', ['kategori'=>$kategori]);
    }
    
    public function create(){
        return view ('create_kategori');
    }
    public function store(Request $request){
        $request->validate([
            'nama_kategori'=>'required'
        ]);
        Kategori::create([
            'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect ('/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }
}
