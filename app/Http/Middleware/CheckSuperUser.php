<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuperUser
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user->id === 2) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
