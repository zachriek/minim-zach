<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Http\Requests\User\ProfileUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\User;

class ProfileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::user()->id;

        $item = User::findOrFail($id);

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'USER')
                ->get();

        return view('pages.user.profile.index', [
            'item' => $item,
            'active' => 'My Profile',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileUserRequest $request)
    {
        //
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
        $item = User::findOrFail($id);

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'USER')
                ->get();

        return view('pages.user.profile.edit', [
            'item' => $item,
            'menus' => $menus,
            'active' => 'My Profile'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUserRequest $request)
    {
        $data = $request->all();
        $id = $request->input('id');

        $item = User::findOrFail($id);

        if ($request->file('image') == null) {
            $item->update($data);
            return redirect()->route('profile-user-index');
        }

        if (Storage::exists('/public/assets/img_profile/'.$item->image) && $item->image != 'undraw_profile.svg') {
            Storage::delete('/public/assets/img_profile/'.$item->image);
        }

        $imageName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->image->storeAs('public/assets/img_profile', $imageName);

        $data['image'] = $imageName;
        $item->update($data);

        return redirect()->route('profile-user-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
