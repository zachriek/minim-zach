<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Menu::first()
                ->paginate(6)
                ->withQueryString();

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.menu.index', [
            'active' => 'Edit Menu',
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
        $items = Menu::all();

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.menu.create', [
            'active' => 'Edit Menu',
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
    public function store(Request $request)
    {
        $data = $request->all();

        Menu::create($data);
        return redirect()->route('menu.index')->with('success', 'New menu added!');
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
        $item = Menu::findOrFail($id);

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.menu.edit', [
            'active' => 'Edit Menu',
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
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Menu::findOrFail($id);
        $item->update($data);

        return redirect()->route('menu.index')->with('succces', 'Menu updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Menu::findOrFail($id);

        $item->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted!');
    }
}
