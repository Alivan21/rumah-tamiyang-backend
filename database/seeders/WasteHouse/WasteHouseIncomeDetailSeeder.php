<?php

namespace Database\Seeders\WasteHouse;

use App\Models\WasteHouse\WasteHouseIncomeDetail;
use App\Models\Workshop\WorkshopincomeDescription;
use Illuminate\Database\Seeder;

class WasteHouseIncomeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            $workshop_income_id = rand(1, 15);
            $workshop_income_lists_id = rand(1, 4);
            $description = '';
            if ($workshop_income_lists_id == 4)
            {
                $description = 'lorem ipsum dolor sit amet';
            }
            WasteHouseIncomeDetail::query()->create([
                'waste_house_income_id' => $workshop_income_id, // 'workshop_incomes_id' => rand(1, 15),
                'waste_house_lists_id' => $workshop_income_lists_id, // 'workshop_incomes_lists_id' => rand(1, 4),
                'amount' => rand(100, 1000),
                'description' => $description
            ]);
        }
    }
}
