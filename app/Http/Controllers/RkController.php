<?php

namespace App\Http\Controllers;

use App\Rk;
use App\Opd;
use App\DtSasaran;
use App\DtIndikator;
use Illuminate\Http\Request;

class RkController extends Controller
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

        return view('admin.pages.rk.index', [
            'opds' => $opds, 
            'sasarans' => $sasarans, 
            'indikators' => $indikators
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
        $rk = Rk::create([
            "tahun" => $request->tahun,
            "opd_id" => $request->opd_id,
            "sasaran_id" => $request->sasaran_id,
            "indikator_id" => $request->indikator_id,
            "target" => $request->target,
            "realisasi" => $request->realisasi
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

        $rk = Rk::where('opd_id', $opd)->where('tahun', $tahun)
        ->with(
            'data_opd',
            'data_sasaran',
            'data_indikator'
        )
        ->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $rk
        ]);
    }

    public function hapus(Request $request)
    {
        $rks = Rk::find($request->id);

        $rks->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
