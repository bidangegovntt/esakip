<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class ClientGalleryController extends Controller
{
    public function index() 
    {
        $galleries = Gallery::orderBy('id', 'desc')->get();

        return view('pages.gallery', ['galleries' => $galleries]);
    }
}
