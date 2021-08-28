<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\Menu;
use App\Models\SubMenu;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'ADMIN')
                ->orWhere('roles', 'USER')
                ->get();

        return view('pages.admin.admin-dashboard', [
            'active' => 'dashboard',
            'total_admin' => User::where('roles', 'ADMIN')->count(),
            'total_users' => User::where('roles', 'USER')->count(),
            'total_photos' => PhotoGallery::count(),
            'total_videos' => VideoGallery::count(),
            'menus' => $menus,
            'id' => Auth::user()->id
        ]);
    }
}
