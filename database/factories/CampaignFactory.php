<?php

// File: database/factories/CampaignFactory.php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nameCampaign' => $this->faker->words(2, true),
            'target' => $this->faker->numberBetween(5, 50),
            'discount' => $this->faker->numberBetween(10, 50),
        ];
    }
}

