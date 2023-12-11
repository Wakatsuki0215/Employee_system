<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\http\Services\PostLoginService;
use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{
    public function login(LoginRequest $request,PostLoginService $service)
    {
        $data = $request->all();
        $result = $service->postLogin($data);
        if ($result) {
            return redirect('employee_list');
        }else{
            return back()->withErrors('ログインに失敗しました。社員番号もしくはパスワードが異なります。');
        }
    }

    // TODO: 動き確認
    public function logout()
    {
        session()->flush();

        return redirect('login');
    }
}
