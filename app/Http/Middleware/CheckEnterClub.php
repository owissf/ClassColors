<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEnterClub
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
        if(Auth::user() == null)
        {
            abort(403);
        }
        if(Auth::user()->clubs->contains($request['club'])){
            return $next($request);
        }
        abort(403);
    }
}
