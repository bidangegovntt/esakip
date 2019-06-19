<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Pk4;
use App\Bidang;
use App\Pk4Layout;
use App\Subbidang;
use App\Pk4Kegiatan;
use App\Pk4Indikator;
use Illuminate\Http\Request;

class Pk4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $bidangs = Bidang::get();
        $subbidangs = Subbidang::get();

        return view('admin.pages.pk4.index', ['opds' => $opds, 'bidangs' => $bidangs, 'subbidangs' => $subbidangs]);
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
        $pk4Data = Pk4::first();
        
        if($pk4Data != [] && $pk4Data->opd_id == $request->opd_id && $pk4Data->bidang_id == $request->bidang_id && $pk4Data->subbidang_id == $request->subbidang_id) {
            $pk4 = Pk4::where([
                'tahun' => $request->tahun_awal,
                'opd_id' => $request->opd_id, 
                'bidang_id' => $request->bidang_id,
                'subbidang_id' => $request->subbidang_id
            ])
            ->first();
        } else {   
            $pk4 = Pk4::create([
                "tahun" => $request->tahun_awal,
                "opd_id" => $request->opd_id, 
                'bidang_id' => $request->bidang_id,
                'subbidang_id' => $request->subbidang_id
            ]);
        }

        // PK IV program
        $pk4_kegiatan = Pk4Kegiatan::create([
            "pk4_id" => $pk4->id,
            "deskripsi" => $request->kegiatan
        ]);

        // /PK IV indikator
        $pk4_indikator = Pk4Indikator::create([
            "kegiatan_id" => $pk4_kegiatan->id,
            "deskripsi" => $request->indikator
        ]);

        // PK IV layout
        $pk4_layout = Pk4Layout::create([
            "kegiatan_id" => $pk4_kegiatan->id,
            "indikator_id" => $pk4_indikator->id,
            "target" => $request->target,
            "sasaran" => $request->sasaran
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
    public function edit(Request $request, $id)
    {
        $pk4s = Pk4Layout::with(
            'data_kegiatan',
            'data_indikator',
            'data_kegiatan.data_pk4',
            'data_kegiatan.data_pk4.data_opd',
            'data_kegiatan.data_pk4.data_bidang',
            'data_kegiatan.data_pk4.data_subbidang'
        )
        ->find($request->id);

        return response()->json([
            'success' => 'data berhasil disimpan',
            'data' => $pk4s
        ]);
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
        $pk4_kegiatan = Pk4Kegiatan::find($request->kegiatan_id);
        $pk4_kegiatan->deskripsi = $request->kegiatan_text;
        $pk4_kegiatan->save();

        $pk4_indikator = Pk4Indikator::find($request->indikator_id);
        $pk4_indikator->deskripsi = $request->indikator_text;
        $pk4_indikator->save();

        $pk4_layout = Pk4Layout::find($request->id);
        $pk4_layout->target = $request->target;
        $pk4_layout->sasaran = $request->sasaran;
        $pk4_layout->save();

        return response()->json([
            'success' => 'data berhasil diperbaharui'
        ]);
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
        $tahun_awal = $request->tahun_awal;
        $opd = $request->opd;
        $bidang = $request->bidang;
        $subbidang = $request->subbidang;

        $pk4s = Pk4Kegiatan::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->whereHas('data_pk4', function($query) use ($tahun_awal, $opd, $bidang, $subbidang) {
            $query->where('tahun', $tahun_awal)->where('opd_id', $opd)->where('bidang_id', $bidang)->where('subbidang_id', $subbidang);
        })
        ->with('data_pk4', 'data_layout.data_kegiatan', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $pk4s
        ]);
    }

    public function hapus(Request $request)
    {
        $pk4 = Pk4Layout::find($request->id);

        $pk4->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
