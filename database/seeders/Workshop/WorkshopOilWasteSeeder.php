<?php

namespace Database\Seeders\Workshop;

use App\Models\Workshop\WorkshopOilWaste;
use App\Models\Workshop\WorkshopServiceRevenue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkshopOilWasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            WorkshopOilWaste::query()->create([
                'user_id' => 3,
                'date' => now()->subDays($i),
                'oil_collects' => rand(100, 1000),
                'oil_out' => rand(100, 1000)
            ]);
        }
    }
}
