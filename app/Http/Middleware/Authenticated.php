<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Authenticated
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
        $user = Auth::user();

        if ($user) {
            if (!$user->verified) {
                return redirect('/verify');
            }
        }

        return $next($request);
    }
}
