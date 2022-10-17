<?php

namespace App\Repositories;

use App\Interfaces\IUnitRepository;
use App\Models\Unit;
use Illuminate\Http\Request as HttpRequest;

class UnitRepository extends BaseRepository implements IUnitRepository
{
    protected $model;

    public function __construct(Unit $model)
    {
        $this->model = $model;
    }

    public function getUnits($businessId)
    {
        return $this->model->where('business_id', $businessId)->get();
    }

    public function getUnit($id)
    {
        return $this->model->find($id);
    }

    public function updateUnit(HttpRequest $request, $id)
    {
        $unit = $this->getUnit($id);
        
        if ($unit) {
            try {
                $unit->name = $request->name;
                $unit->save();

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        } else {
            return false;
        }
    }

}
