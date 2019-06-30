<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        return view('admin.pages.profile.index', ['user' => $user]);
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
        $user = User::find($id);
        $user->name = $request->nama;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $destinationPath = public_path('/adminlte/dist/img/profile');
            File::delete($destinationPath . '/' . $user->avatar);

            $image = $request->file('avatar');
            $image_name = 'user_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/adminlte/dist/img/profile');
            $image->move($path, $image_name);

            $user->avatar = $image_name;
        }

        $user->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('profile.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ubah_password()
    {
        return view('admin.pages.profile.ubah_password');
    }

    public function ubah_password_store(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('profile.ubah_password', ['id' => $id]);
    }
}
