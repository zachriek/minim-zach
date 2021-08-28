<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SubMenu;

class IsMenuActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $submenus = SubMenu::all();

        foreach ($submenus as $submenu) {
            if ($submenu->is_active == 1) {
                return $next($request);
            } 
        }
    
        return back();
    }
}
