<?php

namespace App\Http\Controllers;

use App\Rpjmd;
use App\DtSasaran;
use App\DtIndikator;
use App\RpjmdLayout;
use App\RpjmdTujuan;
use App\RpjmdSasaran;
use Illuminate\Http\Request;
use App\RpjmdIndikatorKinerja;
use App\RpjmdIndikatorKinerjaTarget;

class RpjmdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rpjmds = Rpjmd::get();
        $sasarans = DtSasaran::get();
        $indikators = DtIndikator::get();

        return view('admin.pages.rpjmd.index', [
            'rpjmds' => $rpjmds,
            'sasarans' => $sasarans, 
            'indikators' => $indikators
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        return view('admin.pages.rpjmd.create', [
            'tahun_awal' => $request->tahun,
            'tahun_akhir' => $request->sampai
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rpjmdData = Rpjmd::first();
        
        if($rpjmdData != [] && $rpjmdData->opd_id == $request->opd_id) {
            $rpjmd = Rpjmd::where([
                'tahun_awal' => $request->tahun_awal
            ])
            ->first();
        } else {   
            $rpjmd = Rpjmd::create([
                "tahun_awal" => $request->tahun_awal,
                "tahun_akhir" => $request->tahun_akhir
            ]);
        }

        // rpjmd tujuan
        $rpjmd_tujuan = RpjmdTujuan::create([
            "rpjmd_id" => $rpjmd->id,
            "deskripsi" => $request->tujuan
        ]);

        // // rpjmd sasaran
        // $rpjmd_sasaran = RpjmdSasaran::create([
        //     "rpjmd_tujuan_id" => $rpjmd_tujuan->id,
        //     "deskripsi" => $request->sasaran
        // ]);

        // // rpjmd indikator
        // $rpjmd_indikator = RpjmdIndikatorKinerja::create([
        //     "rpjmd_sasaran_id" => $rpjmd_sasaran->id,
        //     "deskripsi" => $request->indikator
        // ]);

        // foreach($request->target as $key => $targete) {
        //     $rpjmd_target = RpjmdIndikatorKinerjaTarget::create([
        //         "rpjmd_indikator_id" => $rpjmd_indikator->id,
        //         "tahun" => $targete['tahun'],
        //         "nilai" => $targete['nilai']
        //     ]);
        // }

        // rpjmd layout
        $rpjmd_layout = RpjmdLayout::create([
            "tujuan_id" => $rpjmd_tujuan->id,
            "sasaran_id" => $request->sasaran,
            "indikator_id" => $request->indikator,
            "strategi" => $request->strategi,
            "kebijakan" => $request->kebijakan
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
    public function show()
    {
        $rpjmds = Rpjmd::with('data_target')->orderBy('tujuan')->get();

        // return view('admin.pages.rpjmd.index', ['rpjmds' => $rpjmds]);
        // return response($rpjmds);
        return view('admin.pages.rpjmd.datarpjmd', compact('rpjmds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $rpjmd = RpjmdLayout::with(
            'data_tujuan',
            'data_sasaran',
            'data_indikator',
            'data_indikator.data_rpjmd_target',
            'data_tujuan.data_rpjmd'
        )
        ->find($request->id);

        return response()->json([
            'success' => 'data berhasil disimpan',
            'rpjmd' => $rpjmd
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
        $rpjmd_tujuan = RpjmdTujuan::find($request->tujuan_id);
        $rpjmd_tujuan->deskripsi = $request->tujuan_text;
        $rpjmd_tujuan->save();

        $rpjmd_sasaran = RpjmdSasaran::find($request->sasaran_id);
        $rpjmd_sasaran->deskripsi = $request->sasaran_text;
        $rpjmd_sasaran->save();

        $rpjmd_indikator = RpjmdIndikatorKinerja::find($request->indikator_id);
        $rpjmd_indikator->deskripsi = $request->indikator_text;
        $rpjmd_indikator->save();

        $rpjmd_layout = RpjmdLayout::find($request->id);
        $rpjmd_layout->strategi = $request->strategi;
        $rpjmd_layout->kebijakan = $request->kebijakan;
        $rpjmd_layout->save();
        
        // foreach($request->target as $key => $targete) {
        //     RpjmdIndikatorKinerjaTarget::where([
        //         'rpjmd_indikator_id' => $request->indikator_id,
        //         'tahun' => $request->target[$key]['tahun']
        //     ])
        //     ->update(['nilai' => $request->target[$key]['nilai']]);
        // }

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
        $rpjmd = rpjmd::find($id);

        $rpjmd->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function cari(Request $request)
    {
        // return $request;
        $tahun_awal = $request->tahun_awal;
        $tahun_akhir = $request->tahun_akhir;

        $rpjmds = RpjmdTujuan::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->whereHas('data_rpjmd', function($query) use ($tahun_awal, $tahun_akhir) {
            $query->where('tahun_awal', $tahun_awal)->where('tahun_akhir', $tahun_akhir);
        })
        ->with('data_rpjmd','data_layout.data_target', 'data_layout.data_sasaran', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $rpjmds
        ]);
    }

    public function hapus(Request $request)
    {
        $rpjmd = RpjmdLayout::find($request->id);

        $rpjmd->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function tambahSasaran(Request $request)
    {
        $rpjmds = RpjmdLayout::with('data_tujuan', 'data_tujuan.data_rpjmd')
        ->where('id', $request->id)
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $rpjmds
        ]);
    }

    public function masukkanSasaran(Request $request)
    {
        // renstra sasaran
        $rpjmd_sasaran = RpjmdSasaran::create([
            "rpjmd_tujuan_id" => $request->tujuan_id,
            "deskripsi" => $request->sasaran_text
        ]);

        // rpjmd indikator
        $rpjmd_indikator = RpjmdIndikatorKinerja::create([
            "rpjmd_sasaran_id" => $rpjmd_sasaran->id,
            "deskripsi" => $request->indikator_text
        ]);

        foreach($request->target as $key => $targete) {
            $rpjmd_target = RpjmdIndikatorKinerjaTarget::create([
                "rpjmd_indikator_id" => $rpjmd_indikator->id,
                "tahun" => $targete['tahun'],
                "nilai" => $targete['nilai']
            ]);
        }

        // rpjmd layout
        $rpjmd_layout = RpjmdLayout::create([
            "tujuan_id" => $request->tujuan_id,
            "sasaran_id" => $rpjmd_sasaran->id,
            "indikator_id" => $rpjmd_indikator->id
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }

    public function tambahIndikator(Request $request)
    {
        $rpjmds = RpjmdLayout::with(
            'data_tujuan', 
            'data_tujuan.data_rpjmd',
            'data_sasaran'
        )
        ->where('id', $request->id)
        ->first();  
        
        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $rpjmds
        ]);
    }

    public function masukkanIndikator(Request $request)
    {
        // renstra indikator
        $rpjmd_indikator = RpjmdIndikatorKinerja::create([
            "rpjmd_sasaran_id" => $request->sasaran_id,
            "deskripsi" => $request->indikator_text
        ]);

        foreach($request->target as $key => $targete) {
            $rpjmd_target = RpjmdIndikatorKinerjaTarget::create([
                "rpjmd_indikator_id" => $rpjmd_indikator->id,
                "tahun" => $targete['tahun'],
                "nilai" => $targete['nilai']
            ]);
        }

        // rpjmd layout
        $rpjmd_layout = RpjmdLayout::create([
            "tujuan_id" => $request->tujuan_id,
            "sasaran_id" => $request->sasaran_id,
            "indikator_id" => $rpjmd_indikator->id
        ]);

        return response()->json([
            'success' => 'data berhasil disimpan'
        ]);
    }
}
