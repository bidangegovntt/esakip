<?php

namespace App\Http\Controllers;

use App\User;
use App\Opd;
use App\JabatanOpd;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('admin.pages.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opds = Opd::get();
        $jabatan_opds = JabatanOpd::get();

        return view('admin.pages.user.create', ['opds' => $opds, 'jabatan_opds' => $jabatan_opds]);
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
            "name" => "required|min:3|max:100",
            "opd_id" => "required",
            "password" => "required|min:5",
            "roles" => "required"
        ])->validate();

        $users = User::create([
            "name" => $request->name,
            "opd_id" => $request->opd_id,
            'password' => bcrypt($request->password),
            "roles" => $request->roles
        ]);

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('users.create');
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
        $user = User::find($id);
        $opds = Opd::get();

        return view('admin.pages.user.edit', [
                'user' => $user,
                'opds' => $opds
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
            "name" => "required|min:3|max:100",
            // "password" => "required",
            "opd_id" => "required",
            "roles" => "required", 
        ])->validate();

        $user = User::find($id);
        $user->name = $request->name;
        // $user->password = $request->password;
        $user->opd_id = $request->opd_id;
        $user->roles = $request->roles;
        $user->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('users.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        $user->delete();

        $request->session()->flash('status', 'Data ' . $user->nama . ' berhasil dihapus');
        
        return redirect()->route('users.index');
    }
}
