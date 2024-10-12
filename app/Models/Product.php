<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'product_category',
        'product_tags',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
