<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PhotoGallery;
use App\Models\VideoGallery;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $items = PhotoGallery::first()
                ->paginate(6)
                ->withQueryString();

        return view('pages.collections.photo', [
            'type' => 'photo',
            'items' => $items
        ]);
    }

    public function videos(Request $request)
    {
        $items = VideoGallery::first()
                ->paginate(6)
                ->withQueryString();

        return view('pages.collections.video', [
            'type' => 'video',
            'items' => $items
        ]);
    }
}
