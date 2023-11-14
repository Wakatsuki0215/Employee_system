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


Route::middleware('auth')->group(function ()
{
    Route::get('/employee_list',[EmployeeController::class,'index'])->name('index');
           
    Route::post('/logout',[LoginController::class,'logout']); //ログアウト
});



