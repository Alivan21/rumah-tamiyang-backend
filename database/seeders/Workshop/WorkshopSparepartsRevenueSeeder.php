<?php

namespace Database\Seeders\Workshop;

use App\Models\Workshop\WorkshopSparepartsRevenue;
use Illuminate\Database\Seeder;

class WorkshopSparepartsRevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            WorkshopSparepartsRevenue::query()->create([
                'user_id' => 3,
                'date' => now()->subDays($i),
                'revenue' => rand(100, 1000),
            ]);
        }
    }
}
