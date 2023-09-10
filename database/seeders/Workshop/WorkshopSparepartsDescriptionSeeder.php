<?php

namespace Database\Seeders\Workshop;

use App\Models\Workshop\WorkshopServiceDescription;
use App\Models\Workshop\WorkshopSpareparts;
use App\Models\Workshop\WorkshopSparepartsDescription;
use Illuminate\Database\Seeder;

class WorkshopSparepartsDescriptionSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            $workshop_spareparts_revenue_id = rand(1, 15);
            $workshop_spareparts_id = rand(1, 4);
            $description = '';
            if ($workshop_spareparts_id == 4)
            {
                $description = 'lorem ipsum dolor sit amet';
            }

            WorkshopSparepartsDescription::query()->create([
                'workshop_spareparts_revenue_id' => $workshop_spareparts_revenue_id,
                'workshop_spareparts_id' => $workshop_spareparts_id,
                'amount' => rand(50, 100),
                'description' => $description,
            ]);
        }
    }
}
