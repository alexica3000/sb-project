<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        abort_unless(auth()->user()->isAdmin(), 403);

        return $next($request);
    }
}
