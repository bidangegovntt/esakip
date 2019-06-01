<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Renstra;
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

        return view('admin.pages.renstra.index', ['opds' => $opds]);
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
        // renstra
        $renstraData = Renstra::get();
        if($renstraData->tahun_awal == $request->tahun_awal && $renstraData->opd_id == $request->opd_id) {
            $renstras = Renstra::where([
                'tahun_awal' => $request->tahun_awal,
                'opd_id' => $request->opd_id, 
            ])
            ->get();
        } else {
            $renstras = Renstra::create([
                "tahun_awal" => $request->tahun_awal,
                "tahun_akhir" => $request->tahun_akhir,
                "opd_id" => $request->opd_id
            ]);            
        }

        // renstra tujuan
        $renstra_tujuan = RenstraTujuan::create([
            "renstra_id" => $renstras->id,
            "deskripsi" => $request->tujuan
        ]);

        // renstra sasaran
        $renstra_sasaran = RenstraSasaran::create([
            "renstra_tujuan_id" => $renstra_tujuan->id,
            "deskripsi" => $request->sasaran
        ]);

        // renstra indikator
        $renstra_indikator = RenstraIndikator::create([
            "renstra_sasaran_id" => $renstra_sasaran->id,
            "deskripsi" => $request->indikator
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

    public function getDataRenstra()
    {
        // $renstras = RenstraTujuan::with('data_renstra_sasaran.data_renstra_indikator')->get();
        $renstras = RenstraTujuan::with('data_renstra_sasaran.data_renstra_indikator')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $renstras
        ]);
    }
}
