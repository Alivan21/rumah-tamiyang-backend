<?php

namespace Database\Seeders\Workshop;

use Illuminate\Database\Seeder;
use App\Models\Workshop\WorkshopExpenseDescription;
class WorkshopExpenseDescriptionSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            $workshop_expense_id = rand(1, 15);
            $workshop_expense_lists_id = rand(1, 4);
            $description = '';
            if ($workshop_expense_lists_id == 4)
            {
                $description = 'lorem ipsum dolor sit amet';
            }
            WorkshopExpenseDescription::query()->create([
                'workshop_expense_id' => $workshop_expense_id, // 'workshop_expenses_id' => rand(1, 15),
                'workshop_expense_lists_id' => $workshop_expense_lists_id, // 'workshop_expenses_lists_id' => rand(1, 4),
                'amount' => rand(100, 1000),
                'description' => $description
            ]);
        }
    }
}
