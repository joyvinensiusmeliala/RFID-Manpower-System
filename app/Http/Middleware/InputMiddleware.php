<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Closure;

class InputMiddleware
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
        if($request->user() &&
        $request->user()->role_id != 1 &&
        $request->user()->role_id != 2
        )
        return Response(view('unauthorized')->with('role', 'Admin/SuperAdmin'));

        return $next($request);
    }
}
