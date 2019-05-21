<?php

namespace App\Http\Controllers;

use App\Opd;
use App\RencanaStrategi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RencanaStrategiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rencana_strategis = RencanaStrategi::get();

        return view('admin.pages.rencana-strategi.index', ['rencana_strategis' => $rencana_strategis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opds = Opd::get();

        return view('admin.pages.rencana-strategi.create', ['opds' => $opds]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "opd_id" => "required",
            "tahun" => "required",
            "tujuan" => "required",
            "sasaran" => "required",
            "indikator_kinerja" => "required",
            "awal" => "required",
            "perubahan" => "required"
        ])->validate();

        $rencana_strategi = RencanaStrategi::create([
            "opd_id" => $request->opd_id,
            "tahun" => $request->tahun,
            "tujuan" => $request->tujuan,
            "sasaran" => $request->sasaran,
            "indikator_kinerja" => $request->indikator_kinerja,
            "awal" => $request->awal,
            "perubahan" => $request->perubahan,
            "created_by" => Auth::user()->id
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('rencana-strategi.create');
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
        $rencana_strategi = RencanaStrategi::find($id);
        $opds = Opd::get();

        return view('admin.pages.rencana-strategi.edit', ['rencana_strategi' => $rencana_strategi,'opds' => $opds]);
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
        \Validator::make($request->all(), [
            "opd_id" => "required",
            "tahun" => "required",
            "tujuan" => "required",
            "sasaran" => "required",
            "indikator_kinerja" => "required",
            "awal" => "required",
            "perubahan" => "required"
        ])->validate();

        $rencana_strategi = RencanaStrategi::find($id);
        $rencana_strategi->opd_id = $request->opd_id;
        $rencana_strategi->tahun = $request->tahun;
        $rencana_strategi->tujuan = $request->tujuan;
        $rencana_strategi->sasaran = $request->sasaran;
        $rencana_strategi->indikator_kinerja = $request->indikator_kinerja;
        $rencana_strategi->awal = $request->awal;
        $rencana_strategi->perubahan = $request->perubahan;
        $rencana_strategi->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('rencana-strategi.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $rencana_strategi = RencanaStrategi::find($id);

        $rencana_strategi->delete();

        $request->session()->flash('status', 'Data berhasil dihapus');
        
        return redirect()->route('rencana-strategi.index');
    }
}
