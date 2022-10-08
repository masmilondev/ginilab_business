<?php

namespace App\Repositories;

use App\Http\Requests\BusinessRequest;
use App\Interfaces\ICurrencyRepository;
use App\Models\Currency;

class CurrencyRepository extends BaseRepository implements ICurrencyRepository
{
    protected $model;

    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }

    public function getCurrencies($id)
    {
    }
}