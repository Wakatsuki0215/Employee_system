<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use Illuminate\Support\Facades\Hash;


class PostLoginService
{
    public function postLogin(array $data)
    {
        // DBからIDとパスワード取得
        $employee = EmployeeMaster::where('id', $data['id'])->first();
        // $employeeが取得できた場合
        if ($employee) {
            // passwordをmakeVisibleで取得
            $employee->makeVisible(['password']);
            // Hash::checkでリクエストのパスワードとチェック
            if (Hash::check($data['password'], $employee->password)) {
                // sessionにログイン情報を保持
                session([
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'affiliation_id' => $employee->affiliation_id,
                    'role' => $employee->role,
                ]);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
