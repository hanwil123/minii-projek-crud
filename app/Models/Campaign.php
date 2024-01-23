<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = ["nameCampaign", "target", "discount"];

    public function products()
    {
        return $this->hasMany(Product::class, "campaign_id");
    }
}
