<?php

namespace App\Interfaces;

use App\Models\Unit;
use Illuminate\Http\Request;

interface IUnitRepository extends IBaseRepository
{
    public function getUnits($businessId);
    public function getUnit($id);
    public function updateUnit(Request $request, $id);
}
