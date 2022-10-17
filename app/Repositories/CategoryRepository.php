<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function getCategories($businessId)
    {
        return $this->model->where('business_id', $businessId)->get();
    }
}