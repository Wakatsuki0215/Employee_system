<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService
{
    public function updatePassword(string $id, array $data): void
    {
        $employee = EmployeeMaster::find($id)->makeVisible(['password']);
        // パスワード変更
        $employee->password = Hash::make($data['password']);
        //保存
        $employee->save();
    }
}