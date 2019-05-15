<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientGalleryController extends Controller
{
    public function index() 
    {
        return view('pages.gallery');
    }
}
