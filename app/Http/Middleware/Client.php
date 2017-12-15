<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && !Auth::user()->isClient()) {
            if(Auth::user()->isStore()){
                return redirect()->route('stores.login');
            }elseif(Auth::user()->isAdmin()){
                return redirect()->route('admin.login');
            }
        }

        return $next($request);
    }
}
