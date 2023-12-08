<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\http\Services\PostLoginService;
use Illuminate\Support\Facades\Session;

class Myself
{
    public function handle(Request $request, Closure $next)
    {
        // ログインしている社員なら中の画面遷移する。
        if(session()->has('id')){
            return $next($request);
        }
        // ログインしていなければログイン画面に遷移する。
        return redirect('login');
    }
}
