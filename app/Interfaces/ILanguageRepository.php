<?php

namespace App\Interfaces;

interface ILanguageRepository  extends IBaseRepository
{
    public function getLanguages($businessId);
}