<?php

namespace App\Http\Controllers;

use App\DtSasaran;
use App\CapaianPpk;
use App\CapaianKinerja;
use Illuminate\Http\Request;

class Capaian2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.pages.capaian2.index');
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
        //
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

    public function tampil()
    {
        $chartppk = [];
        $chartrk = [];

        $capaianPpk = CapaianPpk::with(
            'data_sasaran', 
            'data_rencana_ppk', 
            'data_realisasi_ppk'
        )
        ->get();

        $capaianRk = CapaianKinerja::with(
            'data_realisasi_kinerja',
            'data_realisasi_kinerja.data_sasaran',
            'data_realisasi_kinerja.data_indikator'
        )
        ->get();

        foreach ($capaianPpk as $key => $capaianPpks) {
            $chartppk[$key] = $capaianPpks->capaian;
        }

        foreach ($capaianRk as $key => $capaianRks) {
            $chartrk[$key] = $capaianRks->capaian;
        }

        $chartppk = CapaianPpk::with(
            'data_sasaran', 
            'data_rencana_ppk', 
            'data_realisasi_ppk'
        )
        ->get()
        ->map(function($query) {
            return [
                "label" => $query->capaian . "%",
                "data" => $query->capaian,
                "color" => "#3c8dbc"
            ];
        });

        $chartrk = CapaianKinerja::with(
            'data_realisasi_kinerja'
        )
        ->get()
        ->map(function($query) {
            return [
                "label" => $query->capaian . "%",
                "data" => $query->capaian,
                "color" => "#3c8dbc"
            ];
        });

        return response()->json([
            'data' => $capaianPpk,
            'rk' => $capaianRk,
            'chartppk' => $chartppk,
            'chartrk' => $chartrk
        ]);
    }
}
