<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// 管理者かどうか
class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (session('role') === Role::Admin) {
            return $next($request);
        }

        return back();
    }
}
