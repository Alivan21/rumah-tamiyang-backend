<?php

namespace Database\Seeders\WasteHouse;

use App\Commons\Enums\WasteHouseListEnum;
use App\Models\WasteHouse\WasteHouseList;
use Illuminate\Database\Seeder;

class WasteHouseListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            WasteHouseListEnum::LAUNDRY_DETERGENT->value,
            WasteHouseListEnum::AROMATHERAPY_CANDLES->value,
            WasteHouseListEnum::LAMP->value,
            WasteHouseListEnum::ETC->value,
        ];

        foreach ($data as $item) {
            WasteHouseList::query()->firstOrCreate([
                'name' => $item,
            ]);
        }
    }
}
