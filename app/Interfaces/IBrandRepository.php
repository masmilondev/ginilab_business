<?php

namespace App\Interfaces;

use App\Http\Requests\BrandRequest;

interface IBrandRepository extends IBaseRepository
{
    public function getBrands($businessId);
    public function getBrand($id);
    public function updateBrand($request, $id);
    public function addBrand(BrandRequest $request, $business_id);
}
