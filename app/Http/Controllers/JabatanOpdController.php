<?php

namespace App\Http\Controllers;

use App\JabatanOpd;
use Illuminate\Http\Request;

class JabatanOpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatanOpds = JabatanOpd::get();

        return view('admin.pages.jabatan-opd.index', ['jabatanOpds' => $jabatanOpds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.jabatan-opd.create');
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
            "nama" => "required|min:5|max:200",
        ])->validate();

        $jabatanOpd = JabatanOpd::create([
            "nama" => $request->nama
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('jabatan-opd.create');
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
        $jabatanOpd = JabatanOpd::find($id);

        return view('admin.pages.jabatan-opd.edit', ['jabatanOpd' => $jabatanOpd]);
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
            "nama" => "required|min:5|max:200",
        ])->validate();

        $jabatanOpd = JabatanOpd::find($id);
        $jabatanOpd->nama = $request->nama;
        $jabatanOpd->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('jabatan-opd.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $jabatanOpd = JabatanOpd::find($id);
        $jabatanOpd->delete();

        $request->session()->flash('status', 'Data ' . $jabatanOpd->nama . ' berhasil dihapus');
        
        return redirect()->route('jabatan-opd.index');
    }
}
