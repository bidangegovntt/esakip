<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Ppk;
use Illuminate\Http\Request;

class PpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $ppks = Ppk::get();

        return view('admin.pages.ppk.index', ['opds' => $opds, 'ppks' => $ppks]);
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

    public function proses(Request $request)
    {
        if($request->btn_cari) {
            $opds = Opd::get();
            $ppks = Ppk::where('opd_id', $request->opd)->where('tahun', $request->tahun)
                ->with('data_opd')
                ->get();
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.ppk.index', ['data' => $data, 'opds' => $opds, 'ppks' => $ppks]);
        } elseif($request->btn_cetak) {
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.ppk.upload', ['data' => $data]);
        } else {
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.ppk.create', ['data' => $data]);
        }
    }
}
