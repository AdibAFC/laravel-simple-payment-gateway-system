<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            // If you hit a route under /admin* and you're not authed -> go to admin login
            if ($request->routeIs('admin.*')) {
                return route('admin.login');
            }
            return route('login'); // if you ever add public user auth later
        }
        return null;
    }
}
