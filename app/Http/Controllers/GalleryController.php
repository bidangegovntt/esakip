<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::get();

        return view('admin.pages.gallery.index', ['galleries' => $galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.gallery.create');
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
            "title" => "required|min:5|max:200",
            "keterangan" => "required|min:20|max:1000"
        ])->validate();

        $image_name = null; 
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image_name = 'gallery_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/img/gallery');
            $image->move($path, $image_name);
        }

        $gallery = Gallery::create([
            "title" =>$request->title,
            "keterangan" => $request->keterangan,
            "gambar" => $image_name
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('gallery.create');
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
        $gallery = Gallery::find($id);

        return view('admin.pages.gallery.edit', ['gallery' => $gallery]);
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
            "title" => "required|min:5|max:200",
            "keterangan" => "required|min:20|max:1000"
        ])->validate();

        $gallery = Gallery::find($id);
        $gallery->title = $request->title;
        $gallery->keterangan = $request->keterangan;

        if ($request->hasFile('gambar')) {
            $destinationPath = public_path('/img/gallery');
            File::delete($destinationPath . '/' . $gallery->gambar);

            $image = $request->file('gambar');
            $image_name = 'gallery_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/img/gallery');
            $image->move($path, $image_name);

            $gallery->gambar = $image_name;
        }

        $gallery->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('gallery.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        $destinationPath = public_path('/img/gallery');
        File::delete($destinationPath . '/' . $gallery->gambar);
        
        $gallery->delete();

        $request->session()->flash('status', 'Data ' . $gallery->nama . ' berhasil dihapus');
        
        return redirect()->route('gallery.index');
    }
}
