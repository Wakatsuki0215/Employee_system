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
            return redirect('employee_list')->with('session','ログインしました。');
        }else{
            return back()->withErrors('ログインに失敗しました。');
        }
    }

    public function logout()
    {
        session()->flush();

        return redirect('login')->with('success_message','ログアウトしました。');
    }
}
