<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function index()
    {
        $pesanan = Pesanan::with('getKeranjang')->where('status_pesanan', '=', 4)->paginate(10);
        $total   = Pesanan::where('status_pesanan', '=', 4)->sum('total_harga');
        $data    = [
            'data'  => $pesanan,
            'total' => $total,
        ];

        return view('admin.laporan')->with($data);
    }
}
