<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService
{
    // NOTE: メソッド名変更
    public function updatePassword(int $id): void // NOTE: 型指定してください
    {
        $employee = EmployeeMaster::find($id)->makeVisible(['password']);
        $tes = collect($employee); .// TODO: 削除してください
        // パスワード変更
        $employee->password = Hash::make('password');// TODO: 桁数指定はいいのか？
        //保存
        $employee->save();
    }
}