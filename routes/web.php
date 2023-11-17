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

Route::post('/login',[LoginController::class,'login']);

// //一覧
// Route::get('/employee_list',[EmployeeController::class,'index'])->name('index')->middleware('auth');
// //登録
// Route::get('/employee_add',[EmployeeController::class,'new'])->name('new')->middleware('auth');
// Route::post('/employee_add',[EmployeeController::class,'create'])->name('create')->middleware('auth');
// //詳細

// //編集

// //ログアウト
// Route::get('/logout',[LoginController::class,'logout']);


// ログイン認証　グループroute
Route::group(['middleware' => 'auth'],function(){
	//一覧
	Route::get('/employee_list',[EmployeeController::class,'index'])->name('index');
	//登録
	Route::get('/employee',[EmployeeController::class,'new'])->name('new');
	Route::post('/employee',[EmployeeController::class,'create'])->name('create');
	//詳細
	// Route::get('',[EmployeeController::class,'show'])->name('show');
	//編集
	// Route::get('',[EmployeeController::class,'edit'])->name('edit');
	//ログアウト
	Route::get('/logout',[LoginController::class,'logout']);
});