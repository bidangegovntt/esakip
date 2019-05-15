<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientBeritaController extends Controller
{
    public function index() 
    {
        return view('pages.berita');
    }
}
