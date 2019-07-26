<?php

namespace App\Http\Controllers;

use App\DtSasaran;
use Illuminate\Http\Request;

class SasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sasaran = DtSasaran::get();

        return view('admin.pages.sasaran.index');
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
        $sasaran = DtSasaran::create([
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
        $sasaran = DtSasaran::where('id', $request->id)->first();

        return response()->json([
            'data' => $sasaran
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
        $sasaran = DtSasaran::find($request->id);
        $sasaran->nama = $request->nama;
        $sasaran->save();

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
        $sasaran = DtSasaran::get();

        return response()->json([
            'data' => $sasaran
        ]);
    }

    public function hapus(Request $request)
    {
        $sasaran = DtSasaran::find($request->id);

        $sasaran->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
