<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /**
     * The name of the factory's corresponding model
    //  * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Item::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image_path' => asset('\images\1732206501.png'),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => fake()->randomFloat(2, 0.99, 30),
            'stock_amount' => fake()->randomNumber(2)
        ];
    }
}
