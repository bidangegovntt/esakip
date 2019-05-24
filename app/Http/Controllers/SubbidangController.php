<?php

namespace App\Http\Controllers;

use App\Subbidang;
use Illuminate\Http\Request;

class SubbidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subbidangs = Subbidang::get();

        return view('admin.pages.subbidang.index', ['subbidangs' => $subbidangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.subbidang.create');
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
            "nama" => "required" 
        ])->validate();

        $subbidang = Subbidang::create([
            "nama" => $request->nama
        ]);

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('subbidang.create');
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
        $subbidang = Subbidang::find($id);

        return view('admin.pages.subbidang.edit', ['subbidang' => $subbidang]);
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
            "nama" => "required" 
        ])->validate();

        $subbidang = Subbidang::find($id);
        $subbidang->nama = $request->nama;
        $subbidang->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('subbidang.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $subbidang = Subbidang::find($id);

        $subbidang->delete();

        $request->session()->flash('status', 'Data ' . $subbidang->nama . ' berhasil dihapus');
        
        return redirect()->route('subbidang.index');
    }
}
