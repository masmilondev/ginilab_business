<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    public function businessType()
    {
        return $this->belongsTo(BusinessType::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'business_language', 'business_id', 'language_id');
    }

    public function currencies()
    {
        return $this->belongsToMany(Currency::class, 'business_currency', 'business_id', 'currency_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'business_user', 'business_id', 'user_id');
    }
}