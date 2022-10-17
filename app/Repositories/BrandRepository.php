<?php

namespace App\Repositories;

use App\Http\Requests\BrandRequest;
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

    // Get brand
    public function getBrand($id)
    {
        return $this->model->find($id);
    }

    // Update brand
    public function updateBrand($request, $id)
    {
        $brand = $this->getBrand($id);
        
        if ($brand) {
            try {
                $brand->name = $request->name;
                $brand->save();

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        } else {
            return false;
        }
    }

    public function addBrand(BrandRequest $request, $business_id)
    {
        try {
            $brand = $this->model->create([
                'name' => $request->name,
                'business_id' => $business_id,
            ]);
            
            return $brand;
        } catch (\Throwable $th) {
            return false;
        }
    }
}