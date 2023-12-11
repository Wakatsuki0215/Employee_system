<?php

namespace App\Http\Services;

use App\Models\EmployeeMaster;
use App\Models\AffiliationMaster;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Hash;


class GetEmployeeListService
{
    public function searchEmployee(array $data): array
    {
        // 社員情報取得 start
        $employee_query = EmployeeMaster::query();

        // 名前
        if (!empty($data['name'])) {
            $employee_query
                ->where('name', 'LIKE', "%{$data['name']}%")
                ->orWhere('kana', 'LIKE', "%{$data['name']}%");
        }

        // 性別
        if (!empty($data['gender'])) {
            $employee_query->where('gender', $data['gender']);
        }

        // 部署
        if (!empty($data['affiliation_id'])) {
            $employee_query->where('affiliation_id', $data['affiliation_id']);
        }

        // 権限
        if (!empty($data['role'])) {
            $employee_query->where('role', $data['role']);
        }

        // 有効無効
        if (empty($data['status'])) {
            $employee_query->where('status', 'enabled');
        }

        $employees = $employee_query->paginate(25);
        // end

        // 部署情報取得 start
        $affiliation_query = AffiliationMaster::query();
        $affiliations = $affiliation_query->get();
        // end

        return [
            'employees' => $employees,
            'affiliations' => $affiliations,
        ];
    }
}
