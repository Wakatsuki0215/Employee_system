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
Route::post('/login', [LoginController::class, 'login']);


//一覧
Route::get('/employee_list', [EmployeeController::class, 'index']);


//詳細
Route::get('/employee_show', [EmployeeController::class, 'show']);


//登録
Route::get('/employee_add', [EmployeeController::class, 'new'])->middleware('checkAdmin');
Route::post('/employee_add', [EmployeeController::class, 'create'])->middleware('checkAdmin');

//編集
Route::get('/employee_edit/{id}', [EmployeeController::class, 'get'])->middleware('checkAdmin');
Route::put('/employee_edit/{id}', [EmployeeController::class, 'update'])->middleware('checkAdmin');

// パスワード変更
Route::put('/employee_password/{id}', [EmployeeController::class, 'password'])->middleware('checkAdminOrCurrentUser:id');

//ログアウト
Route::get('/logout', [LoginController::class, 'logout']);
