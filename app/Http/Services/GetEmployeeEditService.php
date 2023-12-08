<?php

namespace App\Http\Services;

use App\Models\AffiliationMaster;
use App\Models\EmployeeMaster;

class GetEmployeeEditService
{
    public function GetEmployee($data)
    {
        // 社員情報を取得
        $employee = EmployeeMaster::find($data);
        return $employee;
    }

    public function GetAffiliation()
    {
        $affiliations = AffiliationMaster::all();
        return $affiliations;
    }

}
