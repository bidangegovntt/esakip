<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class ClientGalleryController extends Controller
{
    public function index() 
    {
        $galleries = Gallery::get();

        return view('pages.gallery', ['galleries' => $galleries]);
    }
}
