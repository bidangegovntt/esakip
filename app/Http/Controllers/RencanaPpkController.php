<?php

namespace App\Http\Controllers;

use App\Opd;
use App\DtTarget;
use App\DtSasaran;
use App\CapaianPpk;
use App\RencanaPpk;
use App\DtIndikator;
use Illuminate\Http\Request;

class RencanaPpkController extends Controller
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

        return view('admin.pages.rencana-ppk.index', [
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
        $rencanaPpks = RencanaPpk::create([
            "tahun" => $request->tahun,
            "opd_id" => $request->opd_id,
            "sasaran_id" => $request->sasaran_id,
            "indikator_id" => $request->indikator_id,
            "target_id" => $request->target_id,
            "program" => $request->program,
            "kegiatan" => $request->kegiatan,
            "anggaran" => $request->anggaran
        ]);

        $capaianPpk = CapaianPpk::create([
            "opd_id" => $request->opd_id,
            "tahun" => $request->tahun,
            "sasaran_id" => $request->sasaran_id,
            "rencana_ppk_id" => $rencanaPpks->id
        ]);
        
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

        $rencanaPpk = RencanaPpk::where('opd_id', $opd)->where('tahun', $tahun)
        ->with(
            'data_opd',
            'data_sasaran',
            'data_indikator',
            'data_target'
        )
        ->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $rencanaPpk
        ]);
    }

    public function hapus(Request $request)
    {
        $rencanaPpks = RencanaPpk::find($request->id);

        $rencanaPpks->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
