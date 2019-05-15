<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientSakipController extends Controller
{
    public function index() 
    {
        return view('pages.sakip');
    }
}
