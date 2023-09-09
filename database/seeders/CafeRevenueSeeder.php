<?php

namespace Database\Seeders;

use App\Models\CafeRevenue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CafeRevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <  15; $i++) {
                $purchase = rand(10000, 200000);
                $sale = rand(1000, 13000);
                $profit = (($purchase - $sale) / $purchase) * 100;

                CafeRevenue::query()->create([
                'purchase' => $purchase,
                'sale' => $sale,
                'profit' => $profit,
                'user_id' => 2,
                'date' => now()->subDays(rand(1, 30))
            ]);
        }
    }
}
