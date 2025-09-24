<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',  // عنوان عکس (اختیاری)
        'image',  // مسیر عکس
    ];
}
