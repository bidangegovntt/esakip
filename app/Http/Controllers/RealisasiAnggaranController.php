<?php

namespace App\Http\Controllers;

use App\Opd;
use App\RealisasiAnggaran;
use Illuminate\Http\Request;
use App\RencanaAnggaranDetail;
use App\RencanaAnggaranLayout;

class RealisasiAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();

        return view('admin.pages.realisasi-anggaran.index', ['opds' => $opds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cari(Request $request)
    {
        // return $request;
        $tahun = $request->tahun;
        $opd = $request->opd;

        $rencana_anggaran = RencanaAnggaranDetail::whereHas('data_layout.data_rencana_anggaran', function($query) use ($tahun, $opd) {
            $query->where('tahun', $tahun)->where('opd_id', $opd);
        })
        ->where('deleted_at', null)
        ->with(
            'data_layout.data_rencana_anggaran', 
            'data_layout.data_sasaran', 
            'data_layout.data_indikator_kinerja',
            'data_realisasi_anggaran'
        )
        ->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $rencana_anggaran
        ]);
    }

    public function tambahIndikator(Request $request)
    {
        $rencana_anggaran_detail = RencanaAnggaranDetail::where('id', $request->id)
        ->with('data_layout', 'data_layout.data_indikator_kinerja')
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $rencana_anggaran_detail
        ]);
    }

    public function masukkanIndikator(Request $request)
    {
        $program_anggaran = $request->program_anggaran;
        $anggaran = $request->anggaran;
        $persentase = round(($anggaran / $program_anggaran) * 100);

        $realisasi_anggaran_detail = RealisasiAnggaran::create([
            "rencana_anggaran_detail_id" => $request->id,
            "capaian" => $request->capaian,
            "hasil" => $request->hasil,
            "anggaran" => $request->anggaran,
            "persentase" => $persentase
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }

    public function hapus(Request $request)
    {
        $realisasi_anggaran = RealisasiAnggaran::find($request->id);

        $realisasi_anggaran->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
