<?php

namespace App\Interfaces;

use App\Http\Requests\BusinessRequest;

interface IBusinessRepository extends IBaseRepository
{
    public function getBusinessInformation($id);
    public function updateBusiness(BusinessRequest $request, $id);
}