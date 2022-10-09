<?php

namespace App\Repositories;

use App\Interfaces\IServiceTypesRepository;
use App\Models\BusinessType;
use App\Models\ServiceType;

class ServiceTypesRepository extends BaseRepository implements IServiceTypesRepository
{
    protected $model;

    public function __construct(ServiceType $model)
    {
        parent::__construct($model);
    }
}