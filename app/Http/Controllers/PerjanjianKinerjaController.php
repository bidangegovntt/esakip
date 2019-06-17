<?php

namespace App\Http\Controllers;

use App\Opd;
use App\PerjanjianKinerja;
use Illuminate\Http\Request;
use App\PerjanjianKinerjaLayout;
use App\PerjanjianKinerjaSasaran;
use App\PerjanjianKinerjaIndikator;

class PerjanjianKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();

        return view('admin.pages.perjanjian-kinerja.index', ['opds' => $opds]);
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
        $perjanjianKinerjaData = PerjanjianKinerja::first();
        
        if($perjanjianKinerjaData != [] && $perjanjianKinerjaData->opd_id == $request->opd_id) {
            $perjanjian_kinerja = PerjanjianKinerja::where([
                'tahun_awal' => $request->tahun_awal,
                'opd_id' => $request->opd_id, 
            ])
            ->first();
        } else {   
            $perjanjian_kinerja = PerjanjianKinerja::create([
                "tahun_awal" => $request->tahun_awal,
                "tahun_akhir" => $request->tahun_akhir,
                "opd_id" => $request->opd_id
            ]);
        }

        // return $perjanjian_kinerja;

        // perjanjian kinerja sasaran
        $perjanjian_kinerja_sasaran = PerjanjianKinerjaSasaran::create([
            "perjanjian_kinerja_id" => $perjanjian_kinerja->id,
            "deskripsi" => $request->sasaran
        ]);

        // perjanjian kinerja indikator
        $perjanjian_kinerja_indikator = PerjanjianKinerjaIndikator::create([
            "sasaran_id" => $perjanjian_kinerja_sasaran->id,
            "deskripsi" => $request->indikator
        ]);

        // perjanjian kinerja layout
        $perjanjian_kinerja_layout = PerjanjianKinerjaLayout::create([
            "sasaran_id" => $perjanjian_kinerja_sasaran->id,
            "indikator_id" => $perjanjian_kinerja_indikator->id,
            "target_kinerja" => $request->target_kinerja,
            "tw" => $request->tw,
            "target" => $request->target,
            "satuan" => $request->satuan
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
        $perjanjianKinerjas = PerjanjianKinerjaLayout::with(
            'data_sasaran',
            'data_indikator',
            'data_sasaran.data_perjanjian_kinerja',
            'data_sasaran.data_perjanjian_kinerja.data_opd'
        )
        ->find($request->id);

        return response()->json([
            'success' => 'data berhasil disimpan',
            'data' => $perjanjianKinerjas
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
        $perjanjian_kinerja_sasaran = PerjanjianKinerjaSasaran::find($request->sasaran_id);
        $perjanjian_kinerja_sasaran->deskripsi = $request->sasaran_text;
        $perjanjian_kinerja_sasaran->save();

        $perjanjian_kinerja_indikator = PerjanjianKinerjaIndikator::find($request->indikator_id);
        $perjanjian_kinerja_indikator->deskripsi = $request->indikator_text;
        $perjanjian_kinerja_indikator->save();

        $perjanjian_kinerja_layout = PerjanjianKinerjaLayout::find($request->id);
        $perjanjian_kinerja_layout->target_kinerja = $request->target_kinerja;
        $perjanjian_kinerja_layout->tw = $request->tw;
        $perjanjian_kinerja_layout->target = $request->target;
        $perjanjian_kinerja_layout->satuan = $request->satuan;
        $perjanjian_kinerja_layout->save();

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

    public function getDataPerjanjianKinerja()
    {
        $perjanjainKinerjas = PerjanjianKinerjaSasaran::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->with('data_layout.data_sasaran', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $perjanjainKinerjas
        ]);
    }

    public function cari(Request $request)
    {
        // return $request;
        $tahun_awal = $request->tahun_awal;
        $tahun_akhir = $request->tahun_akhir;
        $opd = $request->opd;

        $perjanjianKinerjas = PerjanjianKinerjaSasaran::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->whereHas('data_perjanjian_kinerja', function($query) use ($tahun_awal, $tahun_akhir, $opd) {
            $query->where('tahun_awal', $tahun_awal)->where('tahun_akhir', $tahun_akhir)->where('opd_id', $opd);
        })
        ->with('data_perjanjian_kinerja', 'data_layout.data_sasaran', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $perjanjianKinerjas
        ]);
    }

    public function hapus(Request $request)
    {
        $perjanjianKinerja = PerjanjianKinerjaLayout::find($request->id);

        $perjanjianKinerja->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function tambahIndikator(Request $request)
    {
        $perjanjian_kinerja = PerjanjianKinerjaLayout::with(
            'data_sasaran.data_perjanjian_kinerja', 
            'data_sasaran.data_perjanjian_kinerja.data_opd',
            'data_sasaran'
        )
        ->where('id', $request->id)
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $perjanjian_kinerja
        ]);
    }

    public function masukkanIndikator(Request $request)
    {
        // perjanjian_kinerja indikator
        $perjanjian_kinerja_indikator = PerjanjianKinerjaIndikator::create([
            "sasaran_id" => $request->sasaran_id,
            "deskripsi" => $request->indikator_text
        ]);

        // perjanjian_kinerja layout
        $perjanjian_kinerja_layout = PerjanjianKinerjaLayout::create([
            "sasaran_id" => $request->sasaran_id,
            "indikator_id" => $perjanjian_kinerja_indikator->id,
            "target_kinerja" => $request->target_kinerja,
            "tw" => $request->tw,
            "target" => $request->target,
            "satuan" => $request->satuan
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }
}
