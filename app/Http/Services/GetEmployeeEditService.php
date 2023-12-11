<?php

namespace App\Http\Services;

use App\Models\AffiliationMaster;
use App\Models\EmployeeMaster;

class GetEmployeeEditService
{
    public function getEmployee($data): array // NOTE: 型指定してください
    {
        // 社員情報を取得
        $employee = EmployeeMaster::find($data);

        $affiliations = AffiliationMaster::all();

        return $response = [
            'employee' => $employee,
            'affiliations' => $affiliations,
        ];

        // return $employee;
    }

    // TODO: 削除してください
    public function getAffiliations()
    {
        $affiliations = AffiliationMaster::all();
        return $affiliations;
    }
}
