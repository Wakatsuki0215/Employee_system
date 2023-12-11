<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use App\Models\AffiliationMaster;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Hash;


class PutEmployeeService
{
  public function editEmployee(int $id, array $input): void
  {
    $employee = EmployeeMaster::find($id);
    // 社員情報更新  start
    $employee->name = $input['name'];
    $employee->kana = $input['kana'];
    $employee->gender = $input['gender'];
    $employee->age = $input['age'];
    $employee->postcode = $input['postcode'];
    $employee->address = $input['address'];
    $employee->affiliation_id = $input['affiliation_id'];
    $employee->mail = $input['mail'];
    $employee->tel = $input['tel'];
    $employee->role = $input['role'];
    $employee->status = $input['status'];
    // end

    //保存
    $employee->save();
  }
}
