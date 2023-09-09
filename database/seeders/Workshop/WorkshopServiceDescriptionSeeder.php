<?php

namespace Database\Seeders\Workshop;

use App\Models\Workshop\WorkshopExpenseDescription;
use App\Models\Workshop\WorkshopServiceDescription;
use Illuminate\Database\Seeder;

class WorkshopServiceDescriptionSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            $workshop_service_revenue_id = rand(1, 15);
            $workshop_service_id = rand(1, 4);
            $description = '';
            if ($workshop_service_id == 4)
            {
                $description = 'lorem ipsum dolor sit amet';
            }
            WorkshopServiceDescription::query()->create([
                'workshop_service_revenue_id' => $workshop_service_revenue_id, // 'workshop_expenses_id' => rand(1, 15),
                'workshop_service_id' => $workshop_service_id, // 'workshop_expenses_lists_id' => rand(1, 4),
                'amount' => rand(50, 100),
                'description' => $description,
            ]);
        }
    }
}
