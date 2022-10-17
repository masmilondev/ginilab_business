<?php

namespace App\Repositories;

use App\Interfaces\IBrandRepository;
use App\Models\Brand;
use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository implements IBrandRepository
{
    protected $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function getBrands($businessId)
    {
        return $this->model->where('business_id', $businessId)->get();
    }
}