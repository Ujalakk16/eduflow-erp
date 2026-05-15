<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
  public function handle(Request $request, Closure $next): Response
{
    // user login check
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    // role check (clean + safe)
    if (trim(Auth::user()->role) !== 'admin') {
        abort(403, 'Access Denied');
    }

    return $next($request);
}
}