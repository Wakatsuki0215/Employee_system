<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService
{
    public function updatePassword(int $id): void
    {
        $employee = EmployeeMaster::find($id)->makeVisible(['password']);
        // パスワード変更
        $employee->password = Hash::make('password'); // TODO: 桁数指定はいいのか？
        //保存
        $employee->save();
    }
}
