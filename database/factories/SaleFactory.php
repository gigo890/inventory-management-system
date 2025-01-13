<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 1;
    public function definition(): array
    {
        return [
            'order_id' => self::$order++,
            'user_id' => 1,
            'amount_paid' => fake()->randomFloat(2,0.99,99.99),
        ];
    }
}
