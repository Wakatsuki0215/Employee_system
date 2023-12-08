<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\http\Services\PostLoginService;
use App\http\Services\PostLogoutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(LoginRequest $request,PostLoginService $service): RedirectResponse
    {
        // ログイン
        // 入力した id, passwordを取得
        $data = $request->all();
        // PostLoginServiceクラスに渡す
        $result = $service->postLogin($data);
        if ($result) {
            return redirect('employee_list');
        }else{
            return back()->withErrors('ログインに失敗しました。社員番号もしくはパスワードが違います。');
        }
    }

    public function logout(PostLogoutService $service): RedirectResponse
    {
        //ログアウト
        $logout = $service->postLogout();
        // 画面遷移
        return redirect('login');
    }
}
