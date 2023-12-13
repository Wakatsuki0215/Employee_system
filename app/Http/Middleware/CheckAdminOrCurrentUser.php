<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;


class CheckAdminOrCurrentUser
{
    public function handle(Request $request, Closure $next)
    {
        if(session('role') === Role::Admin || session('id') === $request->id ){
            return $next($request);
        }
        return redirect('employee_list')->withErrors('権限がありません');
    }
}
