<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. pengguna sudah login
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // 2. bandingin role pengguna dengan daftar role yang di izinin
        if (!in_array($request->user()->role, $roles)) {
            abort(403, 'Anda tidak memiliki hak akses!');
        }

        // 3. nerusin request kalau berhasil
        return $next($request);
    }
}