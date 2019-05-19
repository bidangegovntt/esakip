<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientSakipController extends Controller
{
    public function index() 
    {
        return view('pages.sakip');
    }
    public function rencana_strategi() 
    {
        return view('pages.rencanaStrategi');
    }
    public function rencana_kinerja_tahunan()
    {
        return view('pages.rencanaKinerjaTahunan');
    }
    public function indikator_kinerja_utama() 
    {
        return view('pages.indikatorKinerjaUtama');
    }
    public function perjanjian_kinerja()
    {
        return view('pages.perjanjianKinerja');
    }
    public function capaian_kenerja()
    {
        return view('pages.capaianKinerja');
    }
    public function rpjmd()
    {
        return view('pages.rpjmd');
    }
    public function lkjlp()
    {
        return view('pages.lkjlp');
    }
    public function grafik()
    {
        return view('pages.grafik');
    }
}
