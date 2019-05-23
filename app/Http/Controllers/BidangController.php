<?php

namespace App\Http\Controllers;

use App\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bidangs = Bidang::get();

        return view('admin.pages.bidang.index', ['bidangs' => $bidangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.bidang.create');
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

        $bidang = Bidang::create([
            "nama" => $request->nama
        ]);

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('bidang.create');
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
        $bidang = Bidang::find($id);

        return view('admin.pages.bidang.edit', ['bidang' => $bidang]);
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

        $bidang = Bidang::find($id);
        $bidang->nama = $request->nama;
        $bidang->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('bidang.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $bidang = Bidang::find($id);

        $bidang->delete();

        $request->session()->flash('status', 'Data ' . $bidang->nama . ' berhasil dihapus');
        
        return redirect()->route('bidang.index');
    }
}
