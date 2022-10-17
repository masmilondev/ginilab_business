<?php

namespace App\Repositories;

use App\Interfaces\IUnitRepository;

class UnitRepository extends BaseRepository implements IUnitRepository
{
    public function getUnits($businessId)
    {
        return $this->model->where('business_id', $businessId)->get();
    }
}