<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Admin\VideoGalleryRequest;

use App\Models\Menu;
use App\Models\VideoGallery;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = VideoGallery::first()
                ->paginate(6)
                ->withQueryString();

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.videos.index', [
            'active' => 'Videos',
            'items' => $items,
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = VideoGallery::all();

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.videos.create', [
            'active' => 'Videos',
            'items' => $items,
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoGalleryRequest $request)
    {
        $data = $request->all();

        $videoName = time().'.'.$request->file('video')->extension();
        $request->video->storeAs('public/assets/gallery/videos', $videoName);

        $data['video'] = $videoName;
        VideoGallery::create($data);

        return redirect()->route('videos.index')->with('success', 'New video added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = VideoGallery::findOrFail($id);

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.videos.edit', [
            'active' => 'Videos',
            'item' => $item,
            'menus' => $menus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoGalleryRequest $request, $id)
    {
        $data = $request->all();
        $item = VideoGallery::findOrFail($id);

        if ($request->video == null) {
            $item->update($data);
        }

        if (Storage::exists('/public/assets/gallery/videos/'.$item->video)) {
            Storage::delete('/public/assets/gallery/videos/'.$item->video);
        }

        $videoName = time().'.'.$request->file('video')->extension();
        $request->video->storeAs('public/assets/gallery/videos', $videoName);

        $data['video'] = $videoName;
        $item->update($data);

        return redirect()->route('videos.index')->with('success', 'Video updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = VideoGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted!');
    }
}
