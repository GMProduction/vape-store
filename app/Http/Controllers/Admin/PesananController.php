<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    //
    public function index(){
        $pesanan = Pesanan::with('getPelanggan')->paginate(10);
        return view('admin.pesanan.pesanan')->with(['data' => $pesanan]);
    }

    public function getDetailPesanan($id){
        if (\request()->isMethod('POST')){
            $pesanan = Pesanan::find(\request('id'));
            $pesanan->update(['status_pesanan' => \request('status')]);
            return response()->json('berhasil');
        }
        $pesanan = Pesanan::with('getPelanggan')->find($id);
        return $pesanan;
    }


}
