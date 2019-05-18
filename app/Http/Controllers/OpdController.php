<?php

namespace App\Http\Controllers;

use App\Opd;
use Illuminate\Http\Request;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opds = Opd::get();

        return view('admin.pages.opd.index', ['opds' => $opds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.opd.create');
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

        $opd = Opd::create([
            "nama" => $request->nama
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('opd.create');
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
        $opd = Opd::find($id);

        return view('admin.pages.opd.edit', ['opd' => $opd]);
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

        $opd = Opd::find($id);
        $opd->nama = $request->nama;
        $opd->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('opd.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $opd = Opd::find($id);
        $opd->delete();

        $request->session()->flash('status', 'Data ' . $opd->nama . ' berhasil dihapus');
        
        return redirect()->route('opd.index');
    }
}
