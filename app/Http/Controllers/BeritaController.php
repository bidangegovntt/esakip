<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::get();

        return view('admin.pages.berita.index', ['beritas' => $beritas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = null; 
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image_name = 'produk_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/img/berita');
            $image->move($path, $image_name);
        }

        $berita = Berita::create([
            "judul" =>$request->judul,
            "deskripsi" => $request->deskripsi,
            "link" => $request->link,
            "gambar" => $image_name
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('berita.create');
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
        $berita = Berita::find($id);

        return view('admin.pages.berita.edit', ['berita' => $berita]);
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
        $berita = Berita::find($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->link = $request->link;

        if ($request->hasFile('gambar')) {
            $destinationPath = public_path('/img/berita');
            File::delete($destinationPath . '/' . $berita->gambar);

            $image = $request->file('gambar');
            $image_name = 'produk_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/img/berita');
            $image->move($path, $image_name);

            $berita->gambar = $image_name;
        }

        $berita->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('berita.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $berita = Berita::find($id);

        $destinationPath = public_path('/img/berita');
        File::delete($destinationPath . '/' . $berita->gambar);
        
        $berita->delete();

        $request->session()->flash('status', 'Data ' . $berita->nama . ' berhasil dihapus');
        
        return redirect()->route('berita.index');
    }
}
