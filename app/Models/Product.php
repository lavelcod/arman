<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'price' => 'array',
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

   public function getTranslatedPrice($locale = null)
{
    $locale = $locale ?: app()->getLocale();

    if ($locale === 'fa') {
        return $this->price['toman'] ?? 0;
    }

    // برای en و ar دلار نشون بده
    return $this->price['dollar'] ?? 0;
}

public function getFormattedPrice()
{
    $locale = app()->getLocale();
    $price = $this->getTranslatedPrice();

    if ($locale === 'fa') {
        return number_format($price) . ' تومان';
    }

    return number_format($price) . ' $';
}


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
{
    return $this->hasMany(ProductImage::class);
}

}

