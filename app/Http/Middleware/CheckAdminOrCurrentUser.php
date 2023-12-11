<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckAdminOrCurrentUser
{
    public function handle(Request $request, Closure $next)
    {
        //
        if(session()->has('id')){
            return $next($request);
        }
        // TODO:　メッセージ追加「権限がありません」
        return redirect('login');
    }
}
