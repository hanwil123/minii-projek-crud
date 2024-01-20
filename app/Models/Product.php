<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "productID",
        "nameProduct",
        "stock",
        "price",
    ];

    public function getProductIDAttribute()
    {
        return strtoupper(substr($this->name, 0, 3)) . str_pad(rand(1000, 9999), 4, '0');
    }
}
