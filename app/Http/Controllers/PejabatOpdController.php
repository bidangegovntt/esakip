<?php

namespace App\Http\Controllers;

use App\Opd;
use App\JabatanOpd;
use App\PejabatOpd;
use Illuminate\Http\Request;

class PejabatOpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pejabatOpds = PejabatOpd::get();

        return view('admin.pages.pejabat-opd.index', ['pejabatOpds' => $pejabatOpds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opds = Opd::get();
        $jabatanOpds = JabatanOpd::get();
        
        return view('admin.pages.pejabat-opd.create', ['opds' => $opds, 'jabatanOpds' => $jabatanOpds]);
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
            "jabatan_id" => "required",
            "email" => "required",
            "no_telp" => "required",
            "alamat" => "required"
        ])->validate();

        $pejabatOpd = PejabatOpd::create([
            "nip" => $request->nip,
            "nama" => $request->nama,
            'opd_id' => $request->opd_id,
            "jabatan_id" => $request->jabatan_id,
            "email" => $request->email,
            "no_telp" => $request->no_telp,
            "alamat" => $request->alamat
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('pejabat-opd.create');
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
        $pejabatOpd = PejabatOpd::find($id);
        $opds = Opd::get();
        $jabatans = JabatanOpd::get();

        return view('admin.pages.pejabat-opd.edit', [
            'pejabatOpd' => $pejabatOpd, 
            'opds' => $opds, 
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
            "jabatan_id" => "required",
            "email" => "required",
            "no_telp" => "required",
            "alamat" => "required"
        ])->validate();

        $pejabatOpd = PejabatOpd::find($id);
        $pejabatOpd->nip = $request->nip;
        $pejabatOpd->nama = $request->nama;
        $pejabatOpd->opd_id = $request->opd_id;
        $pejabatOpd->jabatan_id = $request->jabatan_id;
        $pejabatOpd->email = $request->email;
        $pejabatOpd->no_telp = $request->no_telp;
        $pejabatOpd->alamat = $request->alamat;
        $pejabatOpd->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('pejabat-opd.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pejabatOpd = PejabatOpd::find($id);

        $pejabatOpd->delete();

        $request->session()->flash('status', 'Data ' . $pejabatOpd->nama . ' berhasil dihapus');
        
        return redirect()->route('pejabat-opd.index');
    }
}
