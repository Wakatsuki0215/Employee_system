<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use App\Models\AffiliationMaster;
use App\Http\Requests\EmployeeRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class PutEmployeeService
{
    public function editEmployee(int $id, array $input): bool
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
        $employee->updated_by = session('id');
        // end

        // NOTE:変更予定の値をtoArrayで配列にする
        $array_employee = $employee->toArray();

        // 排他チェック(楽観)
        if ($input['updated_at'] == $array_employee['updated_at']) {
            //保存
            $employee->save();
            return true;
        } else {
            return false;
        }
    }
}
