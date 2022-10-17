<?php

namespace App\Repositories;

use App\Interfaces\IBrandRepository;
use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository implements IBrandRepository
{
    public function getBrands($businessId)
    {
        return $this->model->where('business_id', $businessId)->get();
    }
}