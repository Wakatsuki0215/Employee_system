<?php

namespace App\Http\Services;

use App\Models\AffiliationMaster;

class GetEmployeeAddService
{
    // NOTE: メソッド名変更
    public function affiliationSelect()
    {
        // affiliation_nameをDBから取得する。
        return AffiliationMaster::all();
    }
}
