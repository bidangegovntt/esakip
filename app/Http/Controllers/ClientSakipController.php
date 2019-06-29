<?php

namespace App\Http\Controllers;

use App\Opd;
use App\RenstraTujuan;
use Illuminate\Http\Request;

class ClientSakipController extends Controller
{
    public function index() 
    {
        return view('pages.sakip');
    }
    public function rencana_strategi() 
    {
        $opds = Opd::get();
        return view('pages.rencanaStrategi', ['opds' => $opds]);
    }
    public function rencana_strategi_cari() 
    {
        $tahun_awal = $request->tahun_awal;
        $tahun_akhir = $request->tahun_akhir;
        $opd = $request->opd;

        $renstras = RenstraTujuan::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->whereHas('data_renstra', function($query) use ($tahun_awal, $tahun_akhir, $opd) {
            $query->where('tahun_awal', $tahun_awal)->where('tahun_akhir', $tahun_akhir)->where('opd', $opd);
        })
        ->with('data_renstra','data_layout.data_target', 'data_layout.data_sasaran', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $renstras
        ]);
    }
    public function rencana_kinerja_tahunan()
    {
        return view('pages.rencanaKinerjaTahunan');
    }
    public function indikator_kinerja_utama() 
    {
        return view('pages.indikatorKinerjaUtama');
    }
    public function perjanjian_kinerja()
    {
        return view('pages.perjanjianKinerja');
    }
    public function capaian_kenerja()
    {
        return view('pages.capaianKinerja');
    }
    public function rpjmd()
    {
        return view('pages.rpjmd');
    }
    public function lkjlp()
    {
        return view('pages.lkjlp');
    }
    public function grafik()
    {
        return view('pages.grafik');
    }
}
