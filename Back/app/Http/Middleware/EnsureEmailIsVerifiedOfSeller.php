<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;

class EnsureEmailIsVerifiedOfSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (
            !$request->user('seller') ||
            ($request->user('seller') instanceof MustVerifyEmail &&
                !$request->user('seller')->hasVerifiedEmail())
        ) {
            return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : Redirect::route($redirectToRoute ?: 'seller.verification.notice');
        }

        return $next($request);
    }
}
