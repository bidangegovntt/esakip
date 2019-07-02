<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Renstra;
use App\RencanaAnggaran;
use App\RealisasiAnggaran;
use Illuminate\Http\Request;
use App\RencanaAnggaranDetail;
use App\RencanaAnggaranLayout;

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
        $tahun = $request->tahun;
        $opd = $request->opd;

        $data = [];
        $tw = [];
        $anggaran = [];
        $realisasi = [];
        $renstras = Renstra::first();

        $ra_layout = RencanaAnggaranLayout::whereHas('data_rencana_anggaran', function($query) use ($tahun, $opd) {
            $query->where('tahun', $tahun)->where('opd_id', $opd);
        })
        ->count();

        $ra = RencanaAnggaranDetail::whereHas('data_layout.data_rencana_anggaran', function($query) use ($tahun, $opd) {
            $query->where('tahun', $tahun)->where('opd_id', $opd);
        })
        ->groupBy('rencana_anggaran_layout_id')
        ->selectRaw('*, sum(anggaran) as sum')
        ->get();
        // ->sum('anggaran');

        $realisasi_anggarans = RealisasiAnggaran::whereHas('data_rencana_anggaran_detail.data_layout.data_rencana_anggaran', function($query) use ($tahun, $opd) {
            $query->where('tahun', $tahun)->where('opd_id', $opd);
        })
        ->groupBy('rencana_anggaran_detail_id')
        ->selectRaw('*, sum(anggaran) as sum')
        ->get();
        
        $count = $renstras->tahun_akhir - $renstras->tahun_awal;
        for ($i = 0; $i <= $count; $i++) { 
            $data[$i] = $renstras->tahun_awal + $i;
        }
        
        $count_layout = $ra_layout;
        for ($i = 0; $i < $count_layout; $i++) { 
            $tw[$i] = "tw" . ($i + 1);
        }

        foreach ($ra as $key => $ras) {
            $anggaran[$key] = $ras->sum;
        }

        foreach ($realisasi_anggarans as $key => $realisasi_anggaran) {
            $realisasi[$key] = $realisasi_anggaran->sum;
        }
        
        return response()->json([
            'data' => $data,
            'tw' => $tw,
            'anggaran' => $anggaran,
            'realisasi' => $realisasi
        ]);
    }
}
