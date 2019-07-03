<?php

namespace App\Http\Controllers;

use App\Opd;
use App\PerjanjianKinerja2;
use Illuminate\Http\Request;

class PerjanjianKinerja2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();
        $perjanjianKinerja2s = PerjanjianKinerja2::with('data_opd')->get();

        return view('admin.pages.perjanjian-kinerja2.index', ['opds' => $opds, 'perjanjianKinerja2s' => $perjanjianKinerja2s]);
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
            $file_name = 'pk_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/file');
            $file->move($path, $file_name);
        }

        $perjanjianKinerja2 = PerjanjianKinerja2::create([
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
        
        return redirect()->route('perjanjianKinerja2.index', ['data' => $data, 'opds' => $opds]);
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
        $perjanjianKinerja2 = PerjanjianKinerja2::find($id);

        $perjanjianKinerja2->delete();

        $request->session()->flash('status', 'Data berhasil dihapus');
        
        return redirect()->route('perjanjianKinerja2.index');
    }

    public function proses(Request $request)
    {
        if($request->btn_cari) {
            $opds = Opd::get();
            $perjanjianKinerja2s = perjanjianKinerja2::where('opd_id', $request->opd)->where('tahun', $request->tahun)
                ->with('data_opd')
                ->get();
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.perjanjian-kinerja2.index', ['data' => $data, 'opds' => $opds, 'perjanjianKinerja2s' => $perjanjianKinerja2s]);
        } else {
            $data = array(
                'tahun'  => $request->tahun,
                'opd' => $request->opd
            );

            return view('admin.pages.perjanjian-kinerja2.upload', ['data' => $data]);
        }
    }
}
