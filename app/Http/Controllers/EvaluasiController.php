<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Evaluasi;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $evaluasis = Evaluasi::with('data_opd')->get();

        return view('admin.pages.evaluasi.index', ['opds' => $opds, 'evaluasis' => $evaluasis]);
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
            $file_name = 'evalusi_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/file');
            $file->move($path, $file_name);
        }

        $evaluasi = Evaluasi::create([
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
        
        return redirect()->route('evaluasi.index', ['data' => $data, 'opds' => $opds]);
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
        $evaluasi = Evaluasi::find($id);

        $evaluasi->delete();

        $request->session()->flash('status', 'Data berhasil dihapus');
        
        return redirect()->route('evaluasi.index');
    }

    public function proses(Request $request)
    {
        if($request->btn_cari) {
            $opds = Opd::get();
            $evaluasis = Evaluasi::where('opd_id', $request->opd)->where('tahun', $request->tahun)
                ->with('data_opd')
                ->get();
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.evaluasi.index', ['data' => $data, 'opds' => $opds, 'evaluasis' => $evaluasis]);
        } else {
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.evaluasi.upload', ['data' => $data]);
        }
    }
}
