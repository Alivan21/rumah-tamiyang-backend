<?php

namespace Database\Seeders\Workshop;

use App\Models\Workshop\WorkshopExpense;
use Illuminate\Database\Seeder;

class WorkshopExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            WorkshopExpense::query()->create([
                'user_id' => 3,
                'date' => now()->subDays($i),
                'expense' => rand(100, 1000)
            ]);
        }
    }
}
