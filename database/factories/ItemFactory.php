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
            'product_id' => 1,
            'branch_id' => 1,
            'stock' => 20,
        ];
    }
}
