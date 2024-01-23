<?php

// app/Models/Product.php

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
        "campaign_id"
    ];

    // Fungsi accessor untuk menghasilkan productID secara otomatis
    public function getProductIDAttribute()
    {
        return strtoupper(substr($this->nameProduct, 0, 3)) . str_pad(rand(1000, 9999), 4, '0');
    }

    // Definisikan relasi Many-to-One dengan Campaign
    public function campaigns()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}

