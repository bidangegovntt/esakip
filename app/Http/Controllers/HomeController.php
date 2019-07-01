<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Renstra;
use App\RencanaAnggaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $opds = Opd::get();
        return view('admin.home', ['opds' => $opds]);
    }

    public function chart(Request $request)
    {
        $data = [];
        $renstras = Renstra::first();
        $rencana_anggaran = RencanaAnggaran::where('tahun', $request->tahun)
        ->with(
            'data_layout',
            'data_layout.data_detail'
        )
        ->first();
        // foreach ($renstras as $key => $renstra) {
        //     $data[$key] = $renstra->tahun_awal;
        // }
        $count = $renstras->tahun_akhir - $renstras->tahun_awal;
        for ($i = 0; $i <= $count; $i++) { 
            $data[$i] = $renstras->tahun_awal + $i;
        }
        
        return response()->json([
            'data' => $data,
            'rencana_anggaran' => $rencana_anggaran
        ]);
    }
}
