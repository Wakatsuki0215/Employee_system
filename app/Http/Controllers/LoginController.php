<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * 認証の試行を処理
     */

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = [
            'id' => $request['id'],
            'password' => $request['password']
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $data = $request->session()->all();

            //session データ取得（ID,name,affiliation,role）
            $id = Auth::id();
            $name = auth() -> user() -> name;
            $affiliation = auth() -> user() -> affiliation_id;
            $role = auth() -> user() -> role;

            return redirect('employee_list');
        }

        return back()->withErrors([
            'email' => 'ログインに失敗しました。社員番号もしくはパスワードが違います。',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        //session データ削除
        $request->session()->flush();

        return redirect('login');
    }
}
