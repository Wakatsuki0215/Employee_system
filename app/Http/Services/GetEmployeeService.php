<?php

namespace App\Http\Services;

use App\Models\AffiliationMaster;
use App\Models\EmployeeMaster;

class GetEmployeeService
{
    public function getEmployee($data): array
    {
        $employee = EmployeeMaster::find($data)->toArray();
        $affiliations = AffiliationMaster::all();
        return $response = [
            'employee' => $employee,
            'affiliations' => $affiliations,
        ];
    }
}
