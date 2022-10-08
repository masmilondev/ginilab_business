<?php

namespace App\Interfaces;

interface IBranchRepository  extends IBaseRepository
{
    public function getBranches($businessId);
}