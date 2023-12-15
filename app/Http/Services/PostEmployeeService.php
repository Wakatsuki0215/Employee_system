<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use Illuminate\Support\Facades\Hash;


class PostEmployeeService
{
    public function addEmployee(array $data): void
    {
        // 社員情報登録 start
        $employee = new EmployeeMaster;
        $employee->name = $data['name'];
        $employee->kana = $data['kana'];
        $employee->gender = $data['gender'];
        $employee->age = $data['age'];
        $employee->postcode = $data['postcode'];
        $employee->address = $data['address'];
        $employee->affiliation_id = $data['affiliation_id'];
        $employee->mail = $data['mail'];
        $employee->tel = $data['tel'];
        $employee->role = $data['role'];
        $employee->status = $data['status'];
        $employee->password = Hash::make($data['password']);
        $employee->created_by = session('id');
        $employee->updated_by = session('id');
        // end

        //保存
        $employee->save();
    }
}
