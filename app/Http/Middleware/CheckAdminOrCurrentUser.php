<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;


/**
 * 管理者権限または自分自身チェック
 */
class CheckAdminOrCurrentUser
{
    public function handle(Request $request, Closure $next)
    {

        // TODO:管理権限or自分自身なのか判断
        // TODO:　$id = session('id');と$id === $request->idが一致
        $id = session('id');

        if (session('role') === Role::Admin || $id === $request->id) {
            return $next($request);
        }
        return redirect('employee_list')->withErrors('権限がありません。');
    }
}
