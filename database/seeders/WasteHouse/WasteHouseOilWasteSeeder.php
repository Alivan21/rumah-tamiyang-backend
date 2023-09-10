<?php

namespace Database\Seeders\WasteHouse;

use App\Models\WasteHouse\WasteHouseWasteOil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WasteHouseOilWasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 15; $i++) {
            $wasteHouseLists = rand(1,4);
            $description = '';
            if($wasteHouseLists == 4){
                $description = 'Waste House';
            }
            WasteHouseWasteOil::query()->create([
                'user_id' =>  4,
                'date' => now()->subDays($i),
                'amount' => rand(50, 100),
                'origin' => $description,
            ]);
        }
    }
}
