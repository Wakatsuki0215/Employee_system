<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\http\Services\PostLoginService;
use Illuminate\Support\Facades\Session;

// 管理者またはじぶん自身かどうか
class CheckAdminOrCurrentUser
{
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('id')){
            return $next($request);
        }

        return redirect('login');
    }
}
