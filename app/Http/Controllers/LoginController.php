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

            // $user = Auth::id();
            // $user = Auth::getName();
            // //session データ取得（ID,name,affiliation,role）
            // $request->session()->get([
            //     'id' => 'id',
            //     'name' => 'name',
            //     'affiliation_id' => 'affiliation_id',
            //     'role' => 'role',
            // ]);

            // //session データ保存
            // $request->session()->put([
            //     'id' => 'id',
            //     'name' => 'name',
            //     'affiliation_id' => 'affiliation_id',
            //     'role' => 'role',
            // ]);

            return redirect('employee_list');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
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
