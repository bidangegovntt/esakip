<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Capaian;
use App\TriwulanOpd;
use App\CapaianLayout;
use Illuminate\Http\Request;

class PengukuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = Capaian::orderBy('id', 'desc')->first();
        
        return view('admin.pages.pengukuran.index', ['tahun_awal' => $tahun->tahun_awal, 'tahun_akhir' => $tahun->tahun_akhir]);
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

    public function cari(Request $request)
    {
        $tahun = $request->tahun;

        $triwulans = TriwulanOpd::where('tahun', $tahun)
        ->with('data_opd')->get();

        return response()->json([
            'success' => 'Berhasil mengambil data',
            'data' => $triwulans
        ]);
    }

    public function detail(Request $request, $id)
    {
        $opd = $request->opd_id;
        $tahun = $request->tahun;

        $dtOpd = Opd::where('id', $opd)->first();

        $capaian = CapaianLayout::whereHas('data_capaian', function($query) use ($opd, $tahun) {
            $query->where('opd_id', $opd)->where('tahun', $tahun);
        })
        ->with(
            'data_capaian',
            'data_capaian.data_opd'
        )
        ->get();

        return view('admin.pages.pengukuran.detail', ['capaians' => $capaian, 'tahun' => $tahun, 'opd' => $dtOpd->nama]);
    }
}
