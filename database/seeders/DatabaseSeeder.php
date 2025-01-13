<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(AdminSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(DisabledUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(BranchSeeder::class);
        // $this->call(OrderSeeder::class);
        $this->call(SaleSeeder::class);
    }
}
