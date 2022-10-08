<?php

namespace App\Repositories;

use App\Interfaces\IBusinessTypeRepository;
use App\Models\BusinessType;

class BusinessTypeRepository extends BaseRepository implements IBusinessTypeRepository
{
    protected $model;

    public function __construct(BusinessType $model)
    {
        parent::__construct($model);
    }
}