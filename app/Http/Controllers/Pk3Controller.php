<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Pk3;
use App\Bidang;
use App\Pk3Layout;
use App\Pk3Program;
use App\Pk3Indikator;
use App\PerjanjianKinerja;
use Illuminate\Http\Request;

class Pk3Controller extends Controller
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

        return view('admin.pages.pk3.index', ['opds' => $opds, 'bidangs' => $bidangs]);
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
        $pk3Data = Pk3::first();
        
        if($pk3Data != [] && $pk3Data->opd_id == $request->opd_id && $pk3Data->bidang_id == $request->bidang_id) {
            $pk3 = Pk3::where([
                'tahun' => $request->tahun_awal,
                'opd_id' => $request->opd_id, 
                'bidang_id' => $request->bidang_id
            ])
            ->first();
        } else {   
            $pk3 = Pk3::create([
                "tahun" => $request->tahun_awal,
                "opd_id" => $request->opd_id, 
                'bidang_id' => $request->bidang_id
            ]);
        }

        // perjanjian kinerja program
        $pk3_program = Pk3Program::create([
            "pk3_id" => $pk3->id,
            "deskripsi" => $request->program
        ]);

        // // perjanjian kinerja indikator
        $pk3_indikator = Pk3Indikator::create([
            "program_id" => $pk3_program->id,
            "deskripsi" => $request->indikator
        ]);

        // perjanjian kinerja layout
        $pk3_layout = Pk3Layout::create([
            "program_id" => $pk3_program->id,
            "indikator_id" => $pk3_indikator->id,
            "target_program" => $request->target_program,
            "sasaran_program" => $request->sasaran_program
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
        $pk3s = Pk3Layout::with(
            'data_program',
            'data_indikator',
            'data_program.data_pk3',
            'data_program.data_pk3.data_opd',
            'data_program.data_pk3.data_bidang'
        )
        ->find($request->id);

        return response()->json([
            'success' => 'data berhasil disimpan',
            'data' => $pk3s
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
        $pk3_program = Pk3Program::find($request->program_id);
        $pk3_program->deskripsi = $request->program_text;
        $pk3_program->save();

        $pk3_indikator = Pk3Indikator::find($request->indikator_id);
        $pk3_indikator->deskripsi = $request->indikator_text;
        $pk3_indikator->save();

        $pk3_layout = Pk3Layout::find($request->id);
        $pk3_layout->target_program = $request->target_program;
        $pk3_layout->sasaran_program = $request->sasaran_program;
        $pk3_layout->save();

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

        $pk3s = Pk3Program::whereHas('data_layout', function($query) {
            $query->where('deleted_at', null);
        })
        ->whereHas('data_pk3', function($query) use ($tahun_awal, $opd, $bidang) {
            $query->where('tahun', $tahun_awal)->where('opd_id', $opd)->where('bidang_id', $bidang);
        })
        ->with('data_pk3', 'data_layout.data_program', 'data_layout.data_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $pk3s
        ]);
    }

    public function hapus(Request $request)
    {
        $pk3 = Pk3Layout::find($request->id);

        $pk3->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
