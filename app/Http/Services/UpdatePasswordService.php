<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService
{
    public function UpdatePassword(int $id)
    {
        $employee = EmployeeMaster::find($id)->makeVisible(['password']);
        $tes = collect($employee);
        // パスワード変更
        $employee->password = Hash::make('password');
        //保存
        $employee->save();
    }
}