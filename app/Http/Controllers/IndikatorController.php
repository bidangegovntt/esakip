<?php

namespace App\Http\Controllers;

use App\DtIndikator;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indikator = DtIndikator::get();

        return view('admin.pages.indikator.index');
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
        $indikator = DtIndikator::create([
            "nama" => $request->nama
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
        $indikator = DtIndikator::where('id', $request->id)->first();

        return response()->json([
            'data' => $indikator
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
        $indikator = DtIndikator::find($request->id);
        $indikator->nama = $request->nama;
        $indikator->save();

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

    public function tampil()
    {
        $Indikator = DtIndikator::get();

        return response()->json([
            'data' => $Indikator
        ]);
    }

    public function hapus(Request $request)
    {
        $Indikator = DtIndikator::find($request->id);

        $Indikator->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
