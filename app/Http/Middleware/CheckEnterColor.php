<?php

namespace App\Http\Middleware;

use App\Models\ClubColor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEnterColor
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
        $color = ClubColor::findOrFail($request['clubColor'])->color_id;
        if(Auth::user()->colors->contains($color)){
            return $next($request);
        }
        abort(403);
    }
}
