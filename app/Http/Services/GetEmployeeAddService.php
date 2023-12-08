<?php

namespace App\Http\Services;

use App\Models\AffiliationMaster;

class GetEmployeeAddService
{
    public function AffiliationSelect()
    {
        // affiliation_nameをDBから取得する。
        // NOTE: テスト
        return AffiliationMaster::all();
    }
}
