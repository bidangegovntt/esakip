<?php

namespace App\Http\Controllers;

use App\Opd;
use App\DtTarget;
use App\DtSasaran;
use App\CapaianPpk;
use App\DtIndikator;
use App\RealisasiPpk;
use Illuminate\Http\Request;

class RealisasiPpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $sasarans = DtSasaran::get();
        $indikators = DtIndikator::get();
        $targets = DtTarget::get();

        return view('admin.pages.realisasi-ppk.index', [
            'opds' => $opds, 
            'sasarans' => $sasarans, 
            'indikators' => $indikators,
            'targets' => $targets
        ]);
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
        $realisasiPpks = RealisasiPpk::create([
            "tahun" => $request->tahun,
            "opd_id" => $request->opd_id,
            "sasaran_id" => $request->sasaran_id,
            "indikator_id" => $request->indikator_id,
            "target_id" => $request->target_id,
            "program" => $request->program,
            "kegiatan" => $request->kegiatan,
            "anggaran" => $request->anggaran
        ]);

        $capaianPpk = CapaianPpk::where('opd_id', $request->opd_id)
        ->where('tahun', $request->tahun)
        ->where('sasaran_id', $request->sasaran_id)
        ->with('data_rencana_ppk')
        ->latest('id')
        ->first();

        $rencana_anggaran = $capaianPpk->data_rencana_ppk->anggaran;
        $realisasi_anggaran = $request->anggaran;
        $hitung = round(($realisasi_anggaran / $rencana_anggaran) * 100);

        // return $hitung;

        $capaianPpk->realisasi_ppk_id = $realisasiPpks->id;
        $capaianPpk->capaian = $hitung;
        $capaianPpk->save();
        
        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
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

        $realisasiPpk = RealisasiPpk::where('opd_id', $opd)->where('tahun', $tahun)
        ->with(
            'data_opd',
            'data_sasaran',
            'data_indikator',
            'data_target'
        )
        ->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $realisasiPpk
        ]);
    }

    public function hapus(Request $request)
    {
        $realisasiPpks = RealisasiPpk::find($request->id);

        $realisasiPpks->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
