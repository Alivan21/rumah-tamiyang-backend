<?php

namespace Database\Seeders\WasteHouse;


use App\Models\WasteHouse\WasteHouseIncome;
use Illuminate\Database\Seeder;

class WasteHouseIncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 15; $i++) {
            WasteHouseIncome::query()->create([
                'user_id' =>  4,
                'date' => now()->subDays($i),
                'income' => rand(50, 100),
            ]);
        }
    }
}
