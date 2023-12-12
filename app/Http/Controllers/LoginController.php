<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\http\Services\PostLoginService;



class LoginController extends Controller
{
    // NOTE: session→success_messageに変更
    // TODO: 画面側のメッセージ受け取りを修正してください。
    public function login(LoginRequest $request, PostLoginService $service)
    {
        $data = $request->all();
        $result = $service->postLogin($data);
        if ($result) {
            return redirect('employee_list')->with('success_message', 'ログインしました。');
        } else {
            return back()->withErrors('ログインに失敗しました。社員番号もしくはパスワードが異なります。');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('login')->with('success_message', 'ログアウトしました。');
    }
}
