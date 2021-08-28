<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\PhotoGalleryRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\Menu;
use App\Models\PhotoGallery;

use File;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = PhotoGallery::first()
                ->paginate(6)
                ->withQueryString();

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.photos.index', [
            'active' => 'Photos',
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
        $items = PhotoGallery::all();

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.photos.create', [
            'active' => 'Photos',
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
    public function store(PhotoGalleryRequest $request)
    {
        $data = $request->all();

        $imageName = time().'.'.$request->file('image')->extension();
        $request->image->storeAs('public/assets/gallery/photos', $imageName);

        $data['image'] = $imageName;
        PhotoGallery::create($data);

        return redirect()->route('photos.index')->with('success', 'New photo added!');
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
        $item = PhotoGallery::findOrFail($id);

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.photos.edit', [
            'item' => $item,
            'menus' => $menus,
            'active' => 'Photos'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoGalleryRequest $request, $id)
    {
        $data = $request->all();
        $item = PhotoGallery::findOrFail($id);

        if ($request->input('image') == null) {
            $item->update($data);
        }

        if (Storage::exists('/public/assets/gallery/photos/'.$item->image)) {
            Storage::delete('/public/assets/gallery/photos/'.$item->image);
        }

        $imageName = time().'.'.$request->file('image')->extension();
        $request->image->storeAs('public/assets/gallery/photos', $imageName);

        $data['image'] = $imageName;
        $item->update($data);

        return redirect()->route('photos.index')->with('success', 'Photo updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PhotoGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('photos.index')->with('success', 'Photo deleted!');
    }
}
