<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Bidang;
use App\Subbidang;
use App\JabatanOpd;
use App\PejabatSubbidang;
use Illuminate\Http\Request;

class PejabatSubbidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pejabatSubbidangs = PejabatSubbidang::get();

        return view('admin.pages.pejabat-subbidang.index', ['pejabatSubbidangs' => $pejabatSubbidangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opds = Opd::get();
        $bidangs = Bidang::get();
        $subbidangs = Subbidang::get();
        $jabatans = JabatanOpd::get();

        return view('admin.pages.pejabat-subbidang.create', [
            'opds' => $opds,
            'bidangs' => $bidangs,
            'subbidangs' => $subbidangs,
            'jabatans' => $jabatans
        ]);
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
            "nip" => "required",
            "nama" => "required",
            "opd_id" => "required",
            "bidang_id" => "required",
            "subbidang_id" => "required",
            "jabatan_id" => "required"
        ])->validate();

        $pejabatSubbidang = PejabatSubbidang::create([
            "nip" => $request->nip,
            "nama" => $request->nama,
            "opd_id" => $request->opd_id,
            "bidang_id" => $request->bidang_id,
            "subbidang_id" => $request->subbidang_id,
            "jabatan_id" => $request->jabatan_id
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('pejabat-subbidang.create');
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
        $pejabatSubbidang = PejabatSubbidang::find($id);
        $opds = Opd::get();
        $bidangs = Bidang::get();
        $subbidangs = Subbidang::get();
        $jabatans = JabatanOpd::get();

        return view('admin.pages.pejabat-subbidang.edit', [
            'pejabatSubbidang' => $pejabatSubbidang, 
            'opds' => $opds,
            'bidangs' => $bidangs,
            'subbidangs' => $subbidangs,
            'jabatans' => $jabatans
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
        \Validator::make($request->all(), [
            "nip" => "required",
            "nama" => "required",
            "opd_id" => "required",
            "bidang_id" => "required",
            "subbidang_id" => "required",
            "jabatan_id" => "required"
        ])->validate();

        $pejabatSubbidang = PejabatSubbidang::find($id);
        $pejabatSubbidang->nip = $request->nip;
        $pejabatSubbidang->nama = $request->nama;
        $pejabatSubbidang->opd_id = $request->opd_id;
        $pejabatSubbidang->bidang_id = $request->bidang_id;
        $pejabatSubbidang->subbidang_id = $request->subbidang_id;
        $pejabatSubbidang->jabatan_id = $request->jabatan_id;
        $pejabatSubbidang->save();

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('pejabat-subbidang.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pejabatSubbidang = PejabatSubbidang::find($id);

        $pejabatSubbidang->delete();

        $request->session()->flash('status', 'Data ' . $pejabatSubbidang->nama . ' berhasil dihapus');
        
        return redirect()->route('pejabat-subbidang.index');
    }
}
