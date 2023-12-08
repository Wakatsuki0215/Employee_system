<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use App\Models\AffiliationMaster;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Hash;


class PostEmployeeService
{
  public function AddEmployee(array $data)
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
    $employee->password = Hash::make('password');//ハッシュ化の桁数指定
    // end

    //保存
    $employee->save();
    return $employee;
  }
}
