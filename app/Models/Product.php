<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;

    public $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'old_price',
        'discount',
    ];
}

