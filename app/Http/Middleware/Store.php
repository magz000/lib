<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Store
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {
        // If the authenticated user is not an admin (not = to 1), then redirect back to home page
        if(Auth::check() && !Auth::user()->isStore()) {
            if(Auth::user()->isClient()){
                return redirect('/');
            }elseif(Auth::user()->isAdmin()){
                return redirect()->route('admin.login');
            }
        }

        return $next($request);



    }
}