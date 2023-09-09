<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Database\Seeders\WasteHouse\WasteHouseEnergyBoxSeeder;
use Database\Seeders\WasteHouse\WasteHouseIncomeSeeder;
use Database\Seeders\WasteHouse\WasteHouseListSeeder;
use Database\Seeders\WasteHouse\WasteHouseProductionSeeder;
use Database\Seeders\Workshop\WorkshopExpenseDescriptionSeeder;
use Database\Seeders\Workshop\WorkshopExpenseListSeeder;
use Database\Seeders\Workshop\WorkshopExpenseSeeder;
use Database\Seeders\Workshop\WorkshopServiceDescriptionSeeder;
use Database\Seeders\Workshop\WorkshopServiceRevenueSeeder;
use Database\Seeders\Workshop\WorkshopServiceSeeder;
use Database\Seeders\Workshop\WorkshopSparepartsDescriptionSeeder;
use Database\Seeders\Workshop\WorkshopSparepartsRevenueSeeder;
use Database\Seeders\Workshop\WorkshopSparepartsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class,

            WorkshopServiceSeeder::class,
            WorkshopSparepartsSeeder::class,
            WorkshopExpenseListSeeder::class,
            WasteHouseListSeeder::class,

            CafeRevenueSeeder::class,

            WorkshopExpenseSeeder::class,
            WorkshopServiceRevenueSeeder::class,
            WorkshopSparepartsRevenueSeeder::class,
            WorkshopSparepartsDescriptionSeeder::class,
            WorkshopExpenseDescriptionSeeder::class,
            WorkshopServiceDescriptionSeeder::class,

            WasteHouseEnergyBoxSeeder::class,
            WasteHouseProductionSeeder::class,
            WasteHouseIncomeSeeder::class,
        ]);
    }
}
