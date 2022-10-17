<?php

namespace App\Interfaces;

interface IBrandRepository extends IBaseRepository
{
    public function getBrands($businessId);
}
