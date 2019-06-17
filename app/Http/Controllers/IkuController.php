<?php

namespace App\Http\Controllers;

use App\Iku;
use App\Opd;
use App\IkuLayout;
use App\IkuSasaran;
use App\IkuIndikator;
use Illuminate\Http\Request;

class IkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();

        return view('admin.pages.iku.index', ['opds' => $opds]);
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
        $ikuData = Iku::first();
        
        if($ikuData == []) {
            $iku = Iku::create([
                "tahun_awal" => $request->tahun_awal,
                "tahun_akhir" => $request->tahun_akhir,
                "opd_id" => $request->opd_id
            ]); 
        } else {
            
            $iku = Iku::where([
                'tahun_awal' => $request->tahun_awal,
                'opd_id' => $request->opd_id, 
            ])
            ->first();
            
        }

        // iku sasaran
        $iku_sasaran = IkuSasaran::create([
            "iku_id" => $iku->id,
            "deskripsi" => $request->sasaran
        ]);

        // iku indikator
        $iku_indikator = IkuIndikator::create([
            "sasaran_id" => $iku_sasaran->id,
            "deskripsi" => $request->indikator
        ]);

        // iku layout
        $iku_layout = IkuLayout::create([
            "sasaran_id" => $iku_sasaran->id,
            "indikator_id" => $iku_indikator->id,
            "penjelasan" => $request->penjelasan,
            "penanggung_jawab" => $request->penanggung_jawab
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
        $iku = IkuLayout::with(
            'data_sasaran',
            'data_indikator',
            'data_sasaran.data_iku',
            'data_sasaran.data_iku.data_opd'
        )
        ->find($request->id);

        return response()->json([
            'success' => 'data berhasil disimpan',
            'iku' => $iku
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
        // return $request->id;
        $iku_sasaran = IkuSasaran::find($request->sasaran_id);
        $iku_sasaran->deskripsi = $request->sasaran_text;
        $iku_sasaran->save();

        $iku_indikator = IkuIndikator::find($request->indikator_id);
        $iku_indikator->deskripsi = $request->indikator_text;
        $iku_indikator->save();

        $iku_layout = IkuLayout::find($request->id);
        $iku_layout->penjelasan = $request->penjelasan;
        $iku_layout->penanggung_jawab = $request->penanggung_jawab;
        $iku_layout->save();

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

    public function getDataIku()
    {
        $ikus = IkuSasaran::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->with('data_layout.data_sasaran', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $ikus
        ]);
    }

    public function hapus(Request $request)
    {
        $iku = IkuLayout::find($request->id);

        $iku->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function tambahIndikator(Request $request)
    {
        $iku = IkuLayout::with(
            'data_sasaran.data_iku', 
            'data_sasaran.data_iku.data_opd',
            'data_sasaran'
        )
        ->where('id', $request->id)
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $iku
        ]);
    }

    public function masukkanIndikator(Request $request)
    {
        // renstra indikator
        $iku_indikator = IkuIndikator::create([
            "sasaran_id" => $request->sasaran_id,
            "deskripsi" => $request->indikator_text
        ]);

        // renstra layout
        $renstra_layout = IkuLayout::create([
            "sasaran_id" => $request->sasaran_id,
            "indikator_id" => $iku_indikator->id,
            "penjelasan" => $request->penjelasan,
            "penanggung_jawab" => $request->penanggung_jawab
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }

    public function cari(Request $request)
    {
        // return $request;
        $tahun_awal = $request->tahun_awal;
        $tahun_akhir = $request->tahun_akhir;
        $opd = $request->opd;

        $ikus = IkuSasaran::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->whereHas('data_iku', function($query) use ($tahun_awal, $tahun_akhir, $opd) {
            $query->where('tahun_awal', $tahun_awal)->where('tahun_akhir', $tahun_akhir)->where('opd_id', $opd);
        })
        ->with('data_iku', 'data_layout.data_sasaran', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $ikus
        ]);
    }
}
