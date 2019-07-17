<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Capaian;
use App\CapaianLayout;
use Illuminate\Http\Request;

class CapaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $capaians = Capaian::get();

        return view('admin.pages.capaian.index', ['opds' => $opds, 'capaians' => $capaians]);
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
        $capaianData = Capaian::first();
        $capaian_id = null;
        
        if($capaianData != [] && $capaianData->opd_id == $request->opd_id && $capaianData->tahun_awal == $request->tahun_awal) {
            $capaian = Capaian::where([
                'tahun_awal' => $request->tahun_awal,
                'tahun_akhir' => $request->tahun_akhir,
                'opd_id' => $request->opd_id 
            ])
            ->first();
            $capaian_id = $capaian->id;
        } else {   
            $capaian = Capaian::create([
                'tahun_awal' => $request->tahun_awal,
                'tahun_akhir' => $request->tahun_akhir,
                'opd_id' => $request->opd_id
            ]);
            $capaian_id = $capaian->id;
        }

        $realisasi_anggaran = ($request->rencana_anggaran * $request->realisasi) / $request->target;
        $capaian = ($realisasi_anggaran * 100) / $request->rencana_anggaran;

        $capaian_layout = CapaianLayout::create([
            "capaian_id" => $capaian_id,
            "tahun" => $request->tahun,
            "sasaran" => $request->sasaran,
            "iku" => $request->iku,
            "satuan" => $request->satuan,
            "target" => $request->target,
            "realisasi" => $request->realisasi,
            "rencana_anggaran" => $request->rencana_anggaran,
            "realisasi_anggaran" => $realisasi_anggaran,
            "capaian" => $capaian
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
        $tahun_awal = $request->tahun_awal;
        $tahun = $request->tahun;
        $opd = $request->opd;

        $capaians = CapaianLayout::whereHas('data_capaian', function($query) use ($tahun_awal, $opd) {
            $query->where('tahun_awal', $tahun_awal)->where('opd_id', $opd);
        })
        ->where('tahun', $tahun)
        ->with(
            'data_capaian',
            'data_capaian.data_opd'
        )
        ->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $capaians
        ]);
    }
    public function hapus(Request $request)
    {
        $capaian = CapaianLayout::find($request->id);

        $capaian->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
