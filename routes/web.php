<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ログイン
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');


// ログインユーザーのみ遷移できる。
Route::group(['middleware' => ['myself']], function () {
    //　社員一覧
    Route::get('/employee_list', [EmployeeController::class, 'index'])->name('index');
    // TODO: 初期取得と検索でrouteを分ける必要はないと思います。
    Route::put('/employee_list', [EmployeeController::class, 'index'])->name('index');

    // 社員詳細
    // TODO: 管理者もしくは自分自身化のミドルウェアが必要
    Route::get('/employee_show', [EmployeeController::class, 'show'])->name('show');

    Route::group(['middleware' => ['authority']], function () {
        // 社員登録
        Route::get('/employee_add', [EmployeeController::class, 'new'])->name('new');
        Route::post('/employee_add', [EmployeeController::class, 'create'])->name('create');

        //編集
        Route::get('/employee_edit/{id}', [EmployeeController::class, 'get'])->name('get');
        Route::put('/employee_edit/{id}', [EmployeeController::class, 'update'])->name('update');

        // パスワード変更
        Route::put('/employee_password/{id}', [EmployeeController::class, 'password'])->name('password_update');
    });
});

//ログアウト
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
