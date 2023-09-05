<?php

namespace Database\Seeders;

use App\Commons\Enums\WorkshopServiceEnum;
use App\Models\Workshop\WorkshopService;
use Illuminate\Database\Seeder;

class WorkshopServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            WorkshopServiceEnum::HEAVY_SERVICE->value,
            WorkshopServiceEnum::LIGHT_SERVICE->value,
            WorkshopServiceEnum::REPLACE_SPAREPART->value,
            WorkshopServiceEnum::ETC->value,
        ];

        foreach ($data as $item) {
            WorkshopService::query()->firstOrCreate([
                'name' => $item,
            ]);
        }
    }
}
