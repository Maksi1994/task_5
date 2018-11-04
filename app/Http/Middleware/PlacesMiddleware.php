<?php

namespace App\Http\Middleware;

use App\Models\Place;
use Closure;

class PlacesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $responce = $next($request);

        if (Place::all()->count()) {
            return $responce;
        }

        return redirect()->route('all-places');
    }
}
