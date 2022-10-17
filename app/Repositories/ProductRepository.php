<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function getProducts($businessId)
    {
        return $this->model->where('business_id', $businessId)->get();
    }
}
