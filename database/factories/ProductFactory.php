<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'IKEA Rat',
            'description' => 'A very handsome little critter from the well known swedish store, IKEA. Their rotundness varies, but is often enhanced after a quick trip to the laundrette.',
            'price' => 4.99,
            'image_path' => '/images/1732206501.png'
        ];
    }
}
