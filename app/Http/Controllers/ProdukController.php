<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\FotoProduk;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends CustomController
{
    //
    public function index()
    {
        $produk = Produk::orderBy('created_at', 'DESC')->filter(\request('kategori'))->paginate(8)->withQueryString();

        return view('produk')->with(['data' => $produk]);
    }

    public function detail($id)
    {
        $produk = Produk::find($id);

        return view('detail')->with(['data' => $produk]);
    }

    public function simpanPesanan($id)
    {
        $field = [
            'id_produk' => $id,
            'qty'       => $this->request->get('qty'),
            'total_harga' => $this->request->get('totalHarga'),
            'keterangan' => $this->request->get('keterangan'),
            'id_user' => Auth::id()
        ];
        Keranjang::create($field);
        return response()->json('berhasil', 200);
    }

    public function getImageProduk($id)
    {
        $image = FotoProduk::where('id_produk', '=', $id)->get();

        return $image;
    }
}
