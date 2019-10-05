<?php

namespace Personality\Http\Middleware;

use Closure;

class CheckIfActive
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
        if ($request->user()->isNotA('member')) {
            return view('personality::auth.pending');
        }

        return $next($request);
    }
}
