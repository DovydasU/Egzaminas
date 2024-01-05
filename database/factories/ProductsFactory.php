<?php

namespace Database\Factories;

use App\Models\Meniulists;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'meniulists_id' => Meniulists::all()->random()->id,
            'name' => $this->faker->words(2, true),
            'image' => "product" . fake()->numberBetween(1, 10) . ".jpg",
            'price' => fake()->randomFloat(2, 30, 150),
            'description' => fake()->text(),
            'active' => $this->faker->boolean,
        ];
    }
}
