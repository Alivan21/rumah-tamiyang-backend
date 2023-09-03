<?php

namespace Database\Seeders;

use App\Commons\Enums\WorkshopSparepartsEnum;
use App\Models\WorkshopSpareparts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkshopSparepartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          WorkshopSparepartsEnum::MACHINE_SPAREPART->value,
            WorkshopSparepartsEnum::EQUIPMENT_SPAREPART->value,
            WorkshopSparepartsEnum::OIL->value,
            WorkshopSparepartsEnum::ETC->value,
        ];

        foreach ($data as $item) {
            WorkshopSpareparts::query()->firstOrCreate([
                'name' => $item,
            ]);
        }
    }
}
