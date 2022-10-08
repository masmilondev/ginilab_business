<?php

namespace App\Interfaces;

interface ICurrencyRepository  extends IBaseRepository
{
    public function getCurrencies($id);
}