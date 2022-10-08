<?php

namespace App\Repositories;

use App\Http\Requests\BusinessRequest;
use App\Interfaces\IBranchRepository;
use App\Models\Branch;
use App\Models\Business;

class BranchRepository extends BaseRepository implements IBranchRepository
{
    protected $model;

    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }

    public function getBranches($id)
    {
    }
}