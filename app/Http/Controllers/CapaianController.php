<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Capaian;
use App\TriwulanOpd;
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
        
        if($capaianData != [] && $capaianData->opd_id == $request->opd_id && $capaianData->tahun_awal == $request->tahun_awal && $capaianData->tahun == $request->tahun) {
            $capaian = Capaian::where([
                'tahun' => $request->tahun,
                'tahun_awal' => $request->tahun_awal,
                'tahun_akhir' => $request->tahun_akhir,
                'opd_id' => $request->opd_id 
            ])
            ->first();
            $capaian_id = $capaian->id;
        } else {   
            $capaian = Capaian::create([
                'tahun' => $request->tahun,
                'tahun_awal' => $request->tahun_awal,
                'tahun_akhir' => $request->tahun_akhir,
                'opd_id' => $request->opd_id
            ]);
            $capaian_id = $capaian->id;

            // for ($i=1; $i < 5; $i++) { 
            //     $triwulan = TriwulanOpd::create([
            //         "capaian_id" => $capaian_id,
            //         "triwulan" => "Triwulan " . $i
            //     ]);
            // };
        }

        $realisasi_anggaran = (intval($request->rencana_anggaran) * intval($request->realisasi)) / intval($request->target);
        $capaian = ($realisasi_anggaran * 100) / intval($request->rencana_anggaran);

        $capaian_layout = CapaianLayout::create([
            "tahun" => $request->tahun,
            "opd_id" => $request->opd_id,
            "capaian_id" => $capaian_id,
            "sasaran" => $request->sasaran,
            "iku" => $request->iku,
            "satuan" => $request->satuan,
            "target" => $request->target,
            "realisasi" => $request->realisasi,
            "rencana_anggaran" => $request->rencana_anggaran,
            "realisasi_anggaran" => $realisasi_anggaran,
            "capaian" => $capaian,
            "triwulan" => $request->triwulan
        ]);

        $opd = $request->opd_id;
        $tahun = $request->tahun;

        $jml_capaian1 = count(CapaianLayout::whereHas('data_capaian', function($query) use ($opd, $tahun) {
            $query->where('opd_id', $opd)->where('tahun', $tahun);
        })->where('triwulan', 'Triwulan 1')->get());
        $jml_capaian2 = count(CapaianLayout::whereHas('data_capaian', function($query) use ($opd, $tahun) {
            $query->where('opd_id', $opd)->where('tahun', $tahun);
        })->where('triwulan', 'Triwulan 2')->get());
        $jml_capaian3 = count(CapaianLayout::whereHas('data_capaian', function($query) use ($opd, $tahun) {
            $query->where('opd_id', $opd)->where('tahun', $tahun);
        })->where('triwulan', 'Triwulan 3')->get());
        $jml_capaian4 = count(CapaianLayout::whereHas('data_capaian', function($query) use ($opd, $tahun) {
            $query->where('opd_id', $opd)->where('tahun', $tahun);
        })->where('triwulan', 'Triwulan 4')->get());

        $dtCapaian1 = CapaianLayout::where('triwulan', 'Triwulan 1')->sum('capaian');
        if (!empty($dtCapaian1)) {
            # code...
            $hitung_capaian1 = $dtCapaian1 / $jml_capaian1;
        } else {
            $hitung_capaian1 = 0;
        }

        if ($hitung_capaian1 < 51) {
            $tidak_tercapai1 = $hitung_capaian1;
            $kurang_tercapai1 = "";
            $tercapai1 = "";
        } elseif ($hitung_capaian1 > 50 && $hitung_capaian1 < 90) {
            $tidak_tercapai1 = "";
            $kurang_tercapai1 = $hitung_capaian1;
            $tercapai1 = "";
        } else {
            $tidak_tercapai1 = "";
            $kurang_tercapai1 = "";
            $tercapai1 = $hitung_capaian1;
        }

        $dtCapaian2 = CapaianLayout::where('triwulan', 'Triwulan 2')->sum('capaian');
        if (!empty($dtCapaian2)) {
            # code...
            $hitung_capaian2 = $dtCapaian2 / $jml_capaian2;
        } else {
            $hitung_capaian2 = 0;
        }

        if ($hitung_capaian2 < 51) {
            $tidak_tercapai2 = $hitung_capaian2;
            $kurang_tercapai2 = "";
            $tercapai2 = "";
        } elseif ($hitung_capaian2 > 50 && $hitung_capaian2 < 90) {
            $tidak_tercapai2 = "";
            $kurang_tercapai2 = $hitung_capaian2;
            $tercapai2 = "";
        } else {
            $tidak_tercapai2 = "";
            $kurang_tercapai2 = "";
            $tercapai2 = $hitung_capaian2;
        }

        $dtCapaian3 = CapaianLayout::where('triwulan', 'Triwulan 3')->sum('capaian');
        if (!empty($dtCapaian3)) {
            # code...
            $hitung_capaian3 = $dtCapaian3 / $jml_capaian2;
        } else {
            $hitung_capaian3 = 0;
        }

        if ($hitung_capaian3 < 51) {
            $tidak_tercapai3 = $hitung_capaian3;
            $kurang_tercapai3 = "";
            $tercapai3 = "";
        } elseif ($hitung_capaian3 > 50 && $hitung_capaian3 < 90) {
            $tidak_tercapai3 = "";
            $kurang_tercapai3 = $hitung_capaian3;
            $tercapai3 = "";
        } else {
            $tidak_tercapai3 = "";
            $kurang_tercapai3 = "";
            $tercapai3 = $hitung_capaian3;
        }

        $dtCapaian4 = CapaianLayout::where('triwulan', 'Triwulan 4')->sum('capaian');
        if (!empty($dtCapaian4)) {
            # code...
            $hitung_capaian4 = $dtCapaian4 / $jml_capaian2;
        } else {
            $hitung_capaian4 = 0;
        }

        if ($hitung_capaian4 < 51) {
            $tidak_tercapai4 = $hitung_capaian4;
            $kurang_tercapai4 = "";
            $tercapai4 = "";
        } elseif ($hitung_capaian4 > 50 && $hitung_capaian4 < 90) {
            $tidak_tercapai4 = "";
            $kurang_tercapai4 = $hitung_capaian4;
            $tercapai4 = "";
        } else {
            $tidak_tercapai4 = "";
            $kurang_tercapai4 = "";
            $tercapai4 = $hitung_capaian4;
        }

        $triwulanOpd = TriwulanOpd::where('capaian_id', $capaian_id)->first();

        if($triwulanOpd != []) {
            $triwulan = TriwulanOpd::where('capaian_id', $capaian_id)->where('triwulan', 'Triwulan 1')
            ->update([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id,
                'jumlah_indikator' => $jml_capaian1,
                'tidak_tercapai' => $tidak_tercapai1,
                'kurang_tercapai' => $kurang_tercapai1,
                'tercapai' => $tercapai1
            ]);

            $triwulan = TriwulanOpd::where('capaian_id', $capaian_id)->where('triwulan', 'Triwulan 2')
            ->update([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id,
                'jumlah_indikator' => $jml_capaian2,
                'tidak_tercapai' => $tidak_tercapai2,
                'kurang_tercapai' => $kurang_tercapai2,
                'tercapai' => $tercapai2
            ]);

            $triwulan = TriwulanOpd::where('capaian_id', $capaian_id)->where('triwulan', 'Triwulan 3')
            ->update([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id,
                'jumlah_indikator' => $jml_capaian3,
                'tidak_tercapai' => $tidak_tercapai3,
                'kurang_tercapai' => $kurang_tercapai3,
                'tercapai' => $tercapai3
            ]);

            $triwulan = TriwulanOpd::where('capaian_id', $capaian_id)->where('triwulan', 'Triwulan 4')
            ->update([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id,
                'jumlah_indikator' => $jml_capaian4,
                'tidak_tercapai' => $tidak_tercapai4,
                'kurang_tercapai' => $kurang_tercapai4,
                'tercapai' => $tercapai4
            ]);
        } else {

            $triwulan = TriwulanOpd::create([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id,
                "capaian_id" => $capaian_id,
                "triwulan" => "Triwulan 1",
                "jumlah_indikator" => $jml_capaian1,
                "tidak_tercapai" => $tidak_tercapai1,
                "kurang_tercapai" => $kurang_tercapai1,
                "tercapai" => $tercapai1
            ]);

            $triwulan = TriwulanOpd::create([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id,
                "capaian_id" => $capaian_id,
                "triwulan" => "Triwulan 2",
                "jumlah_indikator" => $jml_capaian2,
                "tidak_tercapai" => $tidak_tercapai2,
                "kurang_tercapai" => $kurang_tercapai2,
                "tercapai" => $tercapai2
            ]);

            $triwulan = TriwulanOpd::create([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id,
                "capaian_id" => $capaian_id,
                "triwulan" => "Triwulan 3",
                "jumlah_indikator" => $jml_capaian3,
                "tidak_tercapai" => $tidak_tercapai3,
                "kurang_tercapai" => $kurang_tercapai3,
                "tercapai" => $tercapai3
            ]);

            $triwulan = TriwulanOpd::create([
                'tahun' => $request->tahun,
                'opd_id' => $request->opd_id,
                "capaian_id" => $capaian_id,
                "triwulan" => "Triwulan 4",
                "jumlah_indikator" => $jml_capaian4,
                "tidak_tercapai" => $tidak_tercapai4,
                "kurang_tercapai" => $kurang_tercapai4,
                "tercapai" => $tercapai4
            ]);

        }

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

        $capaians = CapaianLayout::whereHas('data_capaian', function($query) use ($tahun, $tahun_awal, $opd) {
            $query->where('tahun', $tahun)->where('tahun_awal', $tahun_awal)->where('opd_id', $opd);
        })
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
