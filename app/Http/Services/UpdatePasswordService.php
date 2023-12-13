<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService
{
    public function updatePassword(string $id, array $data): bool
    {
        $employee = EmployeeMaster::find($id)->makeVisible(['password']);
        // パスワード変更
        $employee->password = Hash::make($data['password']);

        $array_employee = $employee->toArray();
        $employee->updated_by = session('id') ;

        if ($data['updated_at'] == $array_employee['updated_at']){
            //保存
            $employee->save();
            return true;
        }else{
            return false;
        }
    }
}