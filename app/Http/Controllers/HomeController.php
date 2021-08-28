<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PhotoGallery;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $photos = PhotoGallery::where('type', 'popular')->get();
        
        return view('pages.home', [
            'photos' => $photos
        ]);
    }
}
