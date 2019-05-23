<?php

namespace App\Http\Controllers;

use App\Opd;
use App\Bidang;
use App\JabatanOpd;
use App\PejabatBidang;
use Illuminate\Http\Request;

class PejabatBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pejabatBidangs = PejabatBidang::get();
        $bidangs = Bidang::get();

        return view('admin.pages.pejabat-bidang.index', ['pejabatBidangs' => $pejabatBidangs, 'bidangs' => $bidangs]);
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
        $jabatans = JabatanOpd::get();

        return view('admin.pages.pejabat-bidang.create', ['opds' => $opds, 'bidangs' => $bidangs, 'jabatans' => $jabatans]);
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
            "jabatan_id" => "required"
        ])->validate();

        $pejabatBidang = PejabatBidang::create([
            "nip" => $request->nip,
            "nama" => $request->nama,
            "opd_id" => $request->opd_id,
            "bidang_id" => $request->bidang_id,
            "jabatan_id" => $request->jabatan_id
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('pejabat-bidang.create');
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
        $pejabatBidang = PejabatBidang::find($id);
        $opds = Opd::get();
        $bidangs = Bidang::get();
        $jabatans = JabatanOpd::get();

        return view('admin.pages.pejabat-bidang.edit', [
            'pejabatBidang' => $pejabatBidang, 
            'opds' => $opds, 
            'bidangs' => $bidangs,
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
            "jabatan_id" => "required"
        ])->validate();

        $pejabatBidang = PejabatBidang::find($id);
        $pejabatBidang->nip = $request->nip;
        $pejabatBidang->nama = $request->nama;
        $pejabatBidang->opd_id = $request->opd_id;
        $pejabatBidang->bidang_id = $request->bidang_id;
        $pejabatBidang->jabatan_id = $request->jabatan_id;
        $pejabatBidang->save();

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('pejabat-bidang.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pejabatBidang = PejabatBidang::find($id);

        $pejabatBidang->delete();

        $request->session()->flash('status', 'Data ' . $pejabatBidang->nama . ' berhasil dihapus');
        
        return redirect()->route('pejabat-bidang.index');
    }
}
