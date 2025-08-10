<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
      // Fillable fields for mass assignment
    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        'stock_quantity',
        'description',
    ];

    // A product belongs to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
