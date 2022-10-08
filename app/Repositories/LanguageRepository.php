<?php

namespace App\Repositories;

use App\Http\Requests\BusinessRequest;
use App\Interfaces\ILanguageRepository;
use App\Models\Language;

class LanguageRepository extends BaseRepository implements ILanguageRepository
{
    protected $model;

    public function __construct(Language $model)
    {
        parent::__construct($model);
    }

    public function getLanguages($id)
    {
    }
}