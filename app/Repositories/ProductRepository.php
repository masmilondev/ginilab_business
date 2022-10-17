<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository implements IProductRepository
{

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }


    public function getProducts($businessId)
    {
        return $this->model->where('business_id', $businessId)->get();
    }
}
