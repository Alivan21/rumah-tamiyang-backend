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
            $wasteHouseLists = rand(1,4);
            $description = '';
            if($wasteHouseLists == 4){
                $description = 'Waste House';
            }
            WasteHouseProduction::query()->create([
                'user_id' =>  4,
                'waste_house_lists_id' => $wasteHouseLists,
                'date' => now()->subDays($i),
                'amount' => rand(50, 100),
                'description' => $description,
            ]);
        }
    }
}
