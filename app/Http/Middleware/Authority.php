<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authority
{
    public function handle(Request $request, Closure $next)
    {
        // ログインしている社員なら中の画面遷移する。
        if (session('role') === 'admin') {
            return $next($request);
        }
        // ログインしていなければログイン画面に遷移する。
        return back();
    }
}
