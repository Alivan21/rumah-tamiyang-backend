<?php

namespace Database\Seeders\Workshop;

use App\Commons\Enums\WorkshopExpenseEnum;
use App\Models\Workshop\WorkshopExpenseList;
use Illuminate\Database\Seeder;

class WorkshopExpenseListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            WorkshopExpenseEnum::EQUIPMENT->value,
            WorkshopExpenseEnum::ELECTRICITY->value,
            WorkshopExpenseEnum::GAS->value,
            WorkshopExpenseEnum::WATER->value,
            WorkshopExpenseEnum::ETC->value,
        ];

        foreach ($data as $item) {
            WorkshopExpenseList::query()->firstOrCreate([
                'name' => $item,
            ]);
        }
    }
}
