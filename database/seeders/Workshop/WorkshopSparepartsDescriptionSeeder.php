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
            $workshop_sparepart_revenue_id = rand(1, 15);
            $workshop_sparepart_id = rand(1, 4);
            $description = '';
            if ($workshop_sparepart_id == 4)
            {
                $description = 'lorem ipsum dolor sit amet';
            }

            WorkshopSparepartsDescription::query()->create([
                'workshop_sparepart_revenue_id' => $workshop_sparepart_revenue_id, // 'workshop_expenses_id' => rand(1, 15),
                'workshop_sparepart_id' => $workshop_sparepart_id, // 'workshop_expenses_lists_id' => rand(1, 4),
                'amount' => rand(50, 100),
                'description' => $description,
            ]);
        }
    }
}
