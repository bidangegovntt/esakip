<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();

        return view('admin.pages.menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.menu.create');
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
            "nama" => "required",
            "link" => "required"
        ])->validate();

        $menus = Menu::create([
            'nama' => $request->nama,
            'link' => $request->link
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('menu.create');
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
        $menu = Menu::find($id);

        return view('admin.pages.menu.edit', ['menu' => $menu]);
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
            "nama" => "required",
            "link" => "required"
        ])->validate();
        
        $menu = Menu::find($id);
        $menu->nama = $request->nama;
        $menu->link = $request->link;
        $menu->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('menu.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $menu = Menu::find($id);

        $menu->delete();

        $request->session()->flash('status', 'Data ' . $menu->nama . ' berhasil dihapus');
        
        return redirect()->route('menu.index');
    }
}
