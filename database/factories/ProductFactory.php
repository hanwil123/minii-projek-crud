<?php

// database/factories/ProductFactory.php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            "productID"   => strtoupper(substr($this->faker->word, 0, 3)) . $this->faker->randomNumber(4),
            "nameProduct" => $this->faker->word,
            "stock"       => $this->faker->numberBetween(1, 100),
            "price"       => $this->faker->numberBetween(10, 1000),
            "campaign_id" => null,
        ];
    }
}

