<?php

namespace App\Http\Services;

use App\Models\AffiliationMaster;

class GetEmployeeAddService
{
    public function getAffiliation()
    {
        return AffiliationMaster::all();
    }
}
