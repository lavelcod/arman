<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [
        'name',
        'city',
        'address',
        'seller_name',
        'mobile',
        'image',
    ];

    protected $casts = [
        'name' => 'array',
        'city' => 'array',
        'address' => 'array',
    ];

    public function getTranslatedName($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $this->name[$locale] ?? $this->name['fa'] ?? '';
    }

    public function getTranslatedCity($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $this->city[$locale] ?? $this->city['fa'] ?? '';
    }

    public function getTranslatedAddress($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $this->address[$locale] ?? $this->address['fa'] ?? '';
    }
}
