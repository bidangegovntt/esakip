<?php

namespace App\Http\Controllers;

use App\Rpjmd;
use Illuminate\Http\Request;
use App\RpjmdIndikatorKinerjaTarget;

class RpjmdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rpjmds = Rpjmd::get();

        return view('admin.pages.rpjmd.index', ['rpjmds' => $rpjmds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        return view('admin.pages.rpjmd.create', [
            'tahun_awal' => $request->tahun,
            'tahun_akhir' => $request->sampai
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rpjmd = Rpjmd::create([
            'tahun_awal' => $request->tahun_awal,
            'tahun_akhir' => $request->tahun_akhir,
            'tujuan' => $request->tujuan,
            'sasaran' => $request->sasaran,
            'indikator_kinerja' => $request->indikator_kinerja
        ]);

        foreach ($request->target as $key => $targete) {
            $data_insert = RpjmdIndikatorKinerjaTarget::create([
                'rpjmd_id' => $rpjmd->id,
                'tahun' => $request->tahun[$key],
                'nilai' => $targete
            ]);
        }

        $request->session()->flash('status', 'Data berhasil disimpan');
        
        return redirect()->route('rpjmd.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $rpjmds = Rpjmd::with('data_target')->orderBy('tujuan')->get();

        // return view('admin.pages.rpjmd.index', ['rpjmds' => $rpjmds]);
        // return response($rpjmds);
        return view('admin.pages.rpjmd.datarpjmd', compact('rpjmds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rpjmd = Rpjmd::find($id);
        $rpjmd_targets = RpjmdIndikatorKinerjaTarget::where('rpjmd_id', $rpjmd->id)->get();

        return view('admin.pages.rpjmd.edit', ['rpjmd' => $rpjmd, 'rpjmd_targets' => $rpjmd_targets]);
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
        $rpjmd = Rpjmd::find($id);
        $rpjmd->tujuan = $request->tujuan;
        $rpjmd->sasaran = $request->sasaran;
        $rpjmd->indikator_kinerja = $request->indikator_kinerja;
        $rpjmd->save();

        foreach ($request->target as $key => $targete) {
            $data_update = RpjmdIndikatorKinerjaTarget::where([
                    'rpjmd_id' => $rpjmd->id,
                    'tahun' => $request->tahun[$key]
                ])
                ->update(['nilai' => $request->target[$key]]);
        }

        $request->session()->flash('status', 'Data berhasil diubah');
        
        return redirect()->route('rpjmd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rpjmd = rpjmd::find($id);

        $rpjmd->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
