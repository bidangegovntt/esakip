<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Lakip;
use Illuminate\Http\Request;

class LakipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $lakips = Lakip::with('data_opd')->get();

        return view('admin.pages.lakip.index', ['opds' => $opds, 'lakips' => $lakips]);
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = 'lakip_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/file');
            $file->move($path, $file_name);
        }

        $lakip = Lakip::create([
            'tahun' => $request->tahun,
            'opd_id' => $request->opd,
            'file' => $file_name
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        $opds = Opd::get();
        $data = array(
            'tahun'  => $request->tahun,
            'opd' => $request->opd
        );
        
        return redirect()->route('lakip.index', ['data' => $data, 'opds' => $opds]);
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
    public function destroy(Request $request, $id)
    {
        $lakip = Lakip::find($id);

        $lakip->delete();

        $request->session()->flash('status', 'Data berhasil dihapus');
        
        return redirect()->route('lakip.index');
    }

    public function proses(Request $request)
    {
        if($request->btn_cari) {
            $opds = Opd::get();
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.lakip.index', ['data' => $data, 'opds' => $opds]);
        } else {
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.lakip.upload', ['data' => $data]);
        }
    }
}
