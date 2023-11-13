<?php

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


// ログアウト


// Route::middleware(['auth', 'auth.session'])->group(function () {
//     Route::get('/login', function () {
//         // ...
//     });
// });


// 社員名簿一覧
Route::middleware('auth')->group(function (){
    Route::get('/list',[\App\Http\Controllers\LoginController::class,'list'])->name('list');
    Route::post('/logout',[\App\Http\Controllers\LoginController::class,'logout']);
});

Route::get('/list', function () {
    // 認証済みユーザーのみがこのルートにアクセス可能
})->middleware('auth.basic');

Route::get('/list', function () {
    return view('list');
});
