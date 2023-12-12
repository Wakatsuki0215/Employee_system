<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\http\Services\PostLoginService;



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

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
