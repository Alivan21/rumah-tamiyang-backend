<?php

namespace Database\Seeders\WasteHouse;

use App\Models\WasteHouse\WasteHouseEnergyBox;
use App\Models\WasteHouse\WasteHouseProduction;
use Illuminate\Database\Seeder;

class WasteHouseProductionSeeder extends Seeder
{
    public function run(): void
    {
        for ($i=0; $i < 15; $i++) {
            WasteHouseProduction::query()->create([
                'user_id' =>  4,
                'date' => now()->subDays($i),
                'income' => rand(50, 100),
            ]);
        }
    }
}
