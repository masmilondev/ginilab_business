<?php

namespace App\Interfaces;

interface IUnitRepository extends IBaseRepository
{
    public function getUnits($businessId);
}
