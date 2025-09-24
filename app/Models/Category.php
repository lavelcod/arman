<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    protected $casts = [
        'name' => 'array',
    ];


    public function getTranslatedName($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $this->name[$locale] ?? $this->name['fa'] ?? '';
    }

    public function getTranslatedDescription($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $this->description[$locale] ?? $this->description['fa'] ?? '';
    }
}
