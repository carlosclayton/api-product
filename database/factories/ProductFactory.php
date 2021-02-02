<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['BELEZA', 'LIMPEZA'];
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'type' => $types[rand(0,1)]
        ];
    }
}
