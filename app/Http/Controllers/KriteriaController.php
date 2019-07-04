<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RencanaAnggaranDetail;

class KriteriaController extends Controller
{
    public function index($id)
    {
        if ($id == 1) {
            $min = 90;
            $max = 100;
        } elseif ($id == 2) {
            $min = 75;
            $max = 89;
        } elseif ($id == 3) {
            $min = 51;
            $max = 74;
        } elseif ($id == 4) {
            $min = 1;
            $max = 51;
        } else {
            $min = 0;
            $max = 0;
        }

        $rencana_anggaran = RencanaAnggaranDetail::where('deleted_at', null)
        ->whereHas('data_realisasi_anggaran', function($query) use ($min, $max) {
            $query->whereBetween('persentase', [$min, $max]);
        })
        ->with(
            'data_layout.data_rencana_anggaran', 
            'data_layout.data_rencana_anggaran.data_opd', 
            'data_layout.data_sasaran', 
            'data_layout.data_indikator_kinerja',
            'data_realisasi_anggaran'
        )
        ->get();

        return view('admin.pages.kriteria.index', ['rencanaAnggarans' => $rencana_anggaran]);
    }
}
