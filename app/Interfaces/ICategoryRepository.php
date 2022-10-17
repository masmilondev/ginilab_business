<?php

namespace App\Interfaces;

use App\Http\Requests\CategoryRequest;

interface ICategoryRepository extends IBaseRepository
{
    public function getCategories($businessId);
    public function createCategory(CategoryRequest $request);
}
