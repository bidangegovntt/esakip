<?php

namespace App\Http\Controllers;

use App\Opd;
use App\PpkLayout;
use App\RealisasiKinerja;
use Illuminate\Http\Request;

class RealisasiKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();

        return view('admin.pages.realisasi-kinerja.index', ['opds' => $opds]);
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

        $ppk_Layout = PpkLayout::whereHas('data_ppk', function($query) use ($tahun, $opd) {
            $query->where('tahun', $tahun)->where('opd_id', $opd);
        })
        ->where('deleted_at', null)
        ->with(
            'data_ppk',
            'data_realisasi_kinerja',
            'data_sasaran',
            'data_indikator_kinerja'
        )
        ->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $ppk_Layout
        ]);
    }

    public function tambahIndikator(Request $request)
    {
        $realisasi_kinerja = PpkLayout::where('indikator_id', $request->id)
        ->with('data_indikator_kinerja')
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $realisasi_kinerja
        ]);
    }

    public function masukkanIndikator(Request $request)
    {
        $realisasiKinerja = RealisasiKinerja::create([
            "indikator_kinerja_id" => $request->indikator_kinerja_id,
            "tw" => $request->tw,
            "target" => $request->target,
            "keterangan" => $request->keterangan
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }

    public function hapus(Request $request)
    {
        $realisasi_kinerja = RealisasiKinerja::find($request->id);

        $realisasi_kinerja->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
