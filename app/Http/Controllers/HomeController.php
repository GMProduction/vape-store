<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $kategori = Kategori::all();
        $produk = Produk::orderBy('created_at','DESC')->limit(4)->get();
        $data = [
            'kategori' => $kategori,
            'produk' => $produk
        ];
        return view('home')->with($data);
    }

    public function baner(){
        $baner = Baner::all();
        return $baner;
    }
}
