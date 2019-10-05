<?php

namespace Personality\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;

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
        $response = $next($request);
        if ($request->user() &&
            $request->user()->isNotA('member') &&
            ($request->user() instanceof MustVerifyEmail &&
                $request->user()->hasVerifiedEmail())) {
//            abort(403, 'Your membership is still pending.  You will not be able to login until your membership is approved.');
//            redirect()->route('pending');
            return Redirect::route('pending');
        }

        return $response;
    }
}
