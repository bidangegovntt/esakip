<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Ppk;
use App\PpkLayout;
use App\PpkSasaran;
use App\PpkIndikatorKinerja;
use Illuminate\Http\Request;
use App\PpkIndikatorKinerjaDetail;

class PpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $ppks = Ppk::get();

        return view('admin.pages.ppk.index', ['opds' => $opds, 'ppks' => $ppks]);
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
        $ppkData = Ppk::first();
        
        if($ppkData != [] && $ppkData->opd_id == $request->opd_id && $ppkData->tahun == $request->tahun && $ppkData->tahun_awal == $request->tahun_awal) {
            $ppk = Ppk::where([
                'tahun' => $request->tahun,
                'tahun_awal' => $request->tahun_awal,
                'tahun_akhir' => $request->tahun_akhir,
                'opd_id' => $request->opd_id 
            ])
            ->first();
        } else {   
            $ppk = Ppk::create([
                "tahun" => $request->tahun,
                'tahun_awal' => $request->tahun_awal,
                'tahun_akhir' => $request->tahun_akhir,
                'opd_id' => $request->opd_id
            ]);
        }

        $ppk_sasaran = PpkSasaran::create([
            "deskripsi" => $request->sasaran
        ]);

        $ppk_indikator = PpkIndikatorKinerja::create([
            "deskripsi" => $request->indikator_kinerja_text,
            "target_kinerja" => $request->target_kinerja
        ]);

        $ppk_layout = PpkLayout::create([
            "ppk_id" => $ppk->id,
            "sasaran_id" => $ppk_sasaran->id,
            "indikator_id" => $ppk_indikator->id,
            "pagu_anggaran" => $request->pagu_anggaran
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

    public function proses(Request $request)
    {
        if($request->btn_cari) {
            $opds = Opd::get();
            $ppks = Ppk::where('opd_id', $request->opd)->where('tahun', $request->tahun)
                ->with('data_opd')
                ->get();
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.ppk.index', ['data' => $data, 'opds' => $opds, 'ppks' => $ppks]);
        } elseif($request->btn_cetak) {
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.ppk.upload', ['data' => $data]);
        } else {
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.ppk.create', ['data' => $data]);
        }
    }

    public function cari(Request $request)
    {
        // return $request;
        $tahun_awal = $request->tahun_awal;
        $tahun = $request->tahun;
        $opd = $request->opd;

        $ppks = PpkLayout::whereHas('data_ppk', function($query) use ($tahun, $tahun_awal, $opd) {
            $query->where('tahun', $tahun)->where('tahun_awal', $tahun_awal)->where('opd_id', $opd);
        })
        ->where('deleted_at', null)
        ->with(
            'data_ppk', 
            'data_sasaran', 
            'data_indikator_kinerja',
            'data_indikator_kinerja.data_indikator'
        )
        ->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $ppks
        ]);
    }

    public function tambahIndikator(Request $request)
    {
        $ppk_indikator_kinerja = PpkIndikatorKinerja::where('id', $request->id)
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $ppk_indikator_kinerja
        ]);
    }

    public function masukkanIndikator(Request $request)
    {
        $ppk_indikator_detail = PpkIndikatorKinerjaDetail::create([
            "indikator_kinerja_id" => $request->indikator_kinerja_id,
            "program" => $request->program,
            "anggaran_program" => $request->anggaran_program,
            "indikator_program" => $request->indikator_program,
            "target_program" => $request->target_program
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }

    public function hapus(Request $request)
    {
        $ppk = PpkIndikatorKinerjaDetail::find($request->id);

        $ppk->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
