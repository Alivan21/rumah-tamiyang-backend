<?php

namespace Database\Seeders;

use App\Commons\Enums\WorkshopServiceEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkshopService;
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
