<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use App\Models\AffiliationMaster;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Hash;


class PutEmployeeService
{
  public function EditEmployee(array $data, EmployeeMaster $employee)
  {
    // 社員情報更新  start
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
    // end

    //保存
    $employee->save();
    return $employee;
  }
}
