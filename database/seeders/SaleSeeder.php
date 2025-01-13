<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Order;
use App\Models\OrderedItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 25; $i++){
            $amount = random_int(1,5);
            Sale::factory()->count($amount)->create(['user_id' => $i]);
            Order::factory()->count($amount)->create();
            for($j = 1; $j < 5; $j++){
            OrderedItem::factory()->count(random_int(1,5))->create(['order_id' => $j]);
            }
        }
    }
}
