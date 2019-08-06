<?php

namespace App\Http\Controllers;

use PDF;
use App\Opd;
use App\Renstra;
use App\DtSasaran;
use App\DtIndikator;
use App\RenstraLayout;
use App\RenstraTarget;
use App\RenstraTujuan;
use App\RenstraSasaran;
use App\RenstraIndikator;
use Illuminate\Http\Request;

class RenstraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $renstras = Renstra::get();
        $sasarans = DtSasaran::get();
        $indikators = DtIndikator::get();

        return view('admin.pages.renstra.index', [
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
        // return $request->target[0]['tahun'];
        // renstra
        $renstraData = Renstra::first();
        
        if($renstraData != [] && $renstraData->opd_id == $request->opd_id) {
            $renstra = Renstra::where([
                'tahun_awal' => $request->tahun_awal,
                'opd_id' => $request->opd_id, 
            ])
            ->first();
        } else {   
            $renstra = Renstra::create([
                "tahun_awal" => $request->tahun_awal,
                "tahun_akhir" => $request->tahun_akhir,
                "opd_id" => $request->opd_id
            ]);
        }

        // renstra tujuan
        $renstra_tujuan = RenstraTujuan::create([
            "renstra_id" => $renstra->id,
            "deskripsi" => $request->tujuan
        ]);

        // // renstra sasaran
        // $renstra_sasaran = RenstraSasaran::create([
        //     "renstra_tujuan_id" => $renstra_tujuan->id,
        //     "deskripsi" => $request->sasaran
        // ]);

        // // renstra indikator
        // $renstra_indikator = RenstraIndikator::create([
        //     "renstra_sasaran_id" => $renstra_sasaran->id,
        //     "deskripsi" => $request->indikator
        // ]);

        foreach($request->target as $key => $targete) {
            $renstra_target = RenstraTarget::create([
                "renstra_indikator_id" => $request->indikator,
                "tahun" => $targete['tahun'],
                "nilai" => $targete['nilai']
            ]);
        }

        // renstra layout
        $renstra_layout = RenstraLayout::create([
            "tujuan_id" => $renstra_tujuan->id,
            "sasaran_id" => $request->sasaran,
            "indikator_id" => $request->indikator,
            "satuan" => $request->satuan,
            "kinerja_eksiting" => $request->kinerja_eksiting
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
        // return $request->id;
        $renstra = RenstraLayout::with(
            'data_tujuan',
            'data_sasaran',
            'data_indikator',
            'data_indikator.data_renstra_target',
            'data_tujuan.data_renstra',
            'data_tujuan.data_renstra.data_opd'
        )
        ->find($request->id);

        return response()->json([
            'success' => 'data berhasil disimpan',
            'renstra' => $renstra
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
        // $renstra_tujuan = RenstraTujuan::find($request->tujuan_id);
        // $renstra_tujuan->deskripsi = $request->tujuan_text;
        // $renstra_tujuan->save();

        $renstra_sasaran = RenstraSasaran::find($request->sasaran_id);
        $renstra_sasaran->deskripsi = $request->sasaran_text;
        $renstra_sasaran->save();

        $renstra_indikator = RenstraIndikator::find($request->indikator_id);
        $renstra_indikator->deskripsi = $request->indikator_text;
        $renstra_indikator->save();

        $renstra_layout = RenstraLayout::find($request->id);
        $renstra_layout->satuan = $request->satuan;
        $renstra_layout->kinerja_eksiting = $request->kinerja_eksiting;
        $renstra_layout->save();
        
        foreach($request->target as $key => $targete) {
            RenstraTarget::where([
                'renstra_indikator_id' => $request->indikator_id,
                'tahun' => $request->target[$key]['tahun']
            ])
            ->update(['nilai' => $request->target[$key]['nilai']]);
        }

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
    public function destroy(Request $request, $id)
    {
        // $renstra = RenstraLayout::find($id);

        // $renstra->delete();

        // return response()->json([
        //     'success' => 'Record deleted successfully!'
        // ]);
        return "delete";
    }

    public function getDataRenstra()
    {
        // $renstras = RenstraTujuan::with('data_renstra_sasaran.data_renstra_indikator')->get();
        $renstras = RenstraTujuan::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->with('data_layout.data_target', 'data_layout.data_sasaran', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $renstras
        ]);
    }

    public function hapus(Request $request)
    {
        $renstra = RenstraLayout::find($request->id);

        $renstra->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function tambahSasaran(Request $request)
    {
        $renstras = RenstraLayout::with('data_tujuan', 'data_tujuan.data_renstra', 'data_tujuan.data_renstra.data_opd')
        ->where('id', $request->id)
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $renstras
        ]);
    }

    public function masukkanSasaran(Request $request)
    {
        // renstra sasaran
        $renstra_sasaran = RenstraSasaran::create([
            "renstra_tujuan_id" => $request->tujuan_id,
            "deskripsi" => $request->sasaran_text
        ]);

        // renstra indikator
        $renstra_indikator = RenstraIndikator::create([
            "renstra_sasaran_id" => $renstra_sasaran->id,
            "deskripsi" => $request->indikator_text
        ]);

        foreach($request->target as $key => $targete) {
            $renstra_target = RenstraTarget::create([
                "renstra_indikator_id" => $renstra_indikator->id,
                "tahun" => $targete['tahun'],
                "nilai" => $targete['nilai']
            ]);
        }

        // renstra layout
        $renstra_layout = RenstraLayout::create([
            // "tujuan_id" => $request->tujuan_id,
            "sasaran_id" => $renstra_sasaran->id,
            "indikator_id" => $renstra_indikator->id,
            "satuan" => $request->satuan,
            "kinerja_eksiting" => $request->kinerja_eksiting
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }

    public function tambahIndikator(Request $request)
    {
        $renstras = RenstraLayout::with(
            'data_tujuan', 
            'data_tujuan.data_renstra', 
            'data_tujuan.data_renstra.data_opd',
            'data_sasaran'
        )
        ->where('id', $request->id)
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $renstras
        ]);
    }

    public function masukkanIndikator(Request $request)
    {
        // renstra indikator
        $renstra_indikator = RenstraIndikator::create([
            "renstra_sasaran_id" => $request->sasaran_id,
            "deskripsi" => $request->indikator_text
        ]);

        foreach($request->target as $key => $targete) {
            $renstra_target = RenstraTarget::create([
                "renstra_indikator_id" => $renstra_indikator->id,
                "tahun" => $targete['tahun'],
                "nilai" => $targete['nilai']
            ]);
        }

        // renstra layout
        $renstra_layout = RenstraLayout::create([
            "tujuan_id" => $request->tujuan_id,
            "sasaran_id" => $request->sasaran_id,
            "indikator_id" => $renstra_indikator->id,
            "satuan" => $request->satuan,
            "kinerja_eksiting" => $request->kinerja_eksiting
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

        $renstras = RenstraTujuan::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->whereHas('data_renstra', function($query) use ($tahun_awal, $tahun_akhir, $opd) {
            $query->where('tahun_awal', $tahun_awal)->where('tahun_akhir', $tahun_akhir)->where('opd_id', $opd);
        })
        ->with('data_renstra','data_layout.data_target', 'data_layout.data_sasaran', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $renstras
        ]);
    }

    public function cetakPreview(Request $request)
    {
        $tahun_awal = $request->tahun_awal;
        $tahun_akhir = $request->tahun_akhir;
        $opd = $request->opd;

        $data = RenstraTujuan::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->whereHas('data_renstra', function($query) use ($tahun_awal, $tahun_akhir) {
            $query->where('tahun_awal', $tahun_awal)->where('tahun_akhir', $tahun_akhir);
        })
        ->with('data_renstra','data_layout.data_target', 'data_layout.data_sasaran', 'data_layout.data_indikator')
        ->get();
    }

    public function cetak(Request $request)
    {
        $tahun_awal = $request->tahun_awal;
        $tahun_akhir = $request->tahun_akhir;
        $opd = $request->opd;

        return $tahun_akhir . " " . $tahun_awal . " " . $opd;

        // $data = RenstraTujuan::whereHas('data_layout', function($query) {
        //     $query->where('deleted_at', null);
        // })
        // ->whereHas('data_renstra', function($query) use ($tahun_awal, $tahun_akhir) {
        //     $query->where('tahun_awal', $tahun_awal)->where('tahun_akhir', $tahun_akhir);
        // })
        // ->with('data_renstra','data_layout.data_target', 'data_layout.data_sasaran', 'data_layout.data_indikator')
        // ->get();

        // $pdf = PDF::loadView('admin.pages.renstra.cetak');
        // return $pdf->download('invoice.pdf');

        // return view('admin.pages.renstra.cetak', [
        //     'tahun_awal' => $tahun_awal,
        //     'tahun_akhir' => $tahun_akhir,
        //     'opd' => $opd
        // ]);
    }
}
