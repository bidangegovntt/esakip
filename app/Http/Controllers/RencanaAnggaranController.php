<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Sasaran;
use App\RencanaAnggaran;
use App\IndikatorKinerja;
use Illuminate\Http\Request;
use App\RencanaAnggaranDetail;
use App\RencanaAnggaranLayout;

class RencanaAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();

        return view('admin.pages.rencana-anggaran.index', ['opds' => $opds]);
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
        $rencanaAnggaranData = RencanaAnggaran::first();
        
        if($rencanaAnggaranData != [] && $rencanaAnggaranData->opd_id == $request->opd_id && $rencanaAnggaranData->tahun == $request->tahun) {
            $rencanaAnggaran = RencanaAnggaran::where([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id 
            ])
            ->first();
        } else {   
            $rencanaAnggaran = RencanaAnggaran::create([
                "tahun" => $request->tahun,
                'opd_id' => $request->opd_id
            ]);
        }

        $ra_sasaran = Sasaran::create([
            "deskripsi" => $request->sasaran
        ]);

        $sa_indikator = IndikatorKinerja::create([
            "deskripsi" => $request->indikator_kinerja_text,
            "target_kinerja" => $request->target_kinerja
        ]);

        $ra_layout = RencanaAnggaranLayout::create([
            "rencana_anggaran_id" => $rencanaAnggaran->id,
            "sasaran_id" => $ra_sasaran->id,
            "indikator_kinerja_id" => $sa_indikator->id
        ]);

        $ra_detail = RencanaAnggaranDetail::create([
            "rencana_anggaran_layout_id" => $ra_layout->id,
            "program" => $request->program,
            "kegiatan" => $request->kegiatan,
            "indikator_kegiatan" => $request->indikator_kegiatan,
            "target" => $request->target,
            "satuan" => $request->satuan,
            "anggaran" => $request->anggaran
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

        $rencana_anggaran = RencanaAnggaranLayout::whereHas('data_rencana_anggaran', function($query) use ($tahun, $opd) {
            $query->where('tahun', $tahun)->where('opd_id', $opd);
        })
        ->where('deleted_at', null)
        ->with(
            'data_rencana_anggaran', 
            'data_sasaran', 
            'data_indikator_kinerja',
            'data_detail'
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
        $rencana_anggaran_detail = RencanaAnggaranDetail::create([
            "rencana_anggaran_layout_id" => $request->id,
            "program" => $request->program,
            "kegiatan" => $request->kegiatan,
            "indikator_kegiatan" => $request->indikator_kegiatan,
            "target" => $request->target,
            "satuan" => $request->satuan,
            "anggaran" => $request->anggaran
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }

    public function hapus(Request $request)
    {
        $rencana_anggaran_layout = RencanaAnggaranDetail::find($request->id);

        $rencana_anggaran_layout->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
