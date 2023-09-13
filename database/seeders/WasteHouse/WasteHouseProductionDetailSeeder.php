<?php

namespace Database\Seeders\WasteHouse;

use App\Models\WasteHouse\WasteHouseproductionDetail;
use Illuminate\Database\Seeder;

class WasteHouseProductionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            $workshop_production_id = rand(1, 15);
            $workshop_production_lists_id = rand(1, 4);
            $description = '';
            if ($workshop_production_lists_id == 4)
            {
                $description = 'lorem ipsum dolor sit amet';
            }
            WasteHouseProductionDetail::query()->create([
                'waste_house_production_id' => $workshop_production_id, // 'workshop_productions_id' => rand(1, 15),
                'waste_house_lists_id' => $workshop_production_lists_id, // 'workshop_productions_lists_id' => rand(1, 4),
                'amount' => rand(100, 1000),
                'description' => $description
            ]);
        }
    }
}
