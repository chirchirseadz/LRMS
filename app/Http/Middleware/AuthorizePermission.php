<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizePermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        if (!Auth::user()->hasPermissionTo($permission)) {
            return redirect()->back();
        }

        return $next($request);
    }
}

