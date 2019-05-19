<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    public function index() 
    {
        $beritas = Berita::limit(4)->get();

        return view('pages.home', ['beritas' => $beritas]);
    }
}
