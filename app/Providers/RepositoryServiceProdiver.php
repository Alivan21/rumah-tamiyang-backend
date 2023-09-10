<?php

namespace App\Providers;

use App\Contract\Admin\IAdminRepository;
use App\Contract\ICafeRevenueRepository;
use App\Contract\WasteHouse\IWasteHouseEnergyBoxRepository;
use App\Contract\WasteHouse\IWasteHouseIncomeRepository;
use App\Contract\WasteHouse\IWasteHouseProductionRepository;
use App\Contract\WasteHouse\IWasteHouseWasteOilRepository;
use App\Contract\Workshop\IWorkshopDescriptionRepository;
use App\Contract\Workshop\IWorkshopExpenseDescriptionRepository;
use App\Contract\Workshop\IWorkshopExpenseRepository;
use App\Contract\Workshop\IWorkshopOilWasteRepository;
use App\Contract\Workshop\IWorkshopServiceDescriptionRepository;
use App\Contract\Workshop\IWorkshopServiceRepository;
use App\Contract\Workshop\IWorkshopServiceRevenueRepository;
use App\Contract\Workshop\IWorkshopSparepartDescriptionRepository;
use App\Contract\Workshop\IWorkshopSparepartRevenueRepository;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\CafeRevenue\CafeRevenueRepository;
use App\Repositories\WasteHouse\WasteHouseEnergyBoxRepository;
use App\Repositories\WasteHouse\WasteHouseIncomeRepository;
use App\Repositories\WasteHouse\WasteHouseProductionRepository;
use App\Repositories\WasteHouse\WasteHouseWasteOilRepository;
use App\Repositories\Workshop\WorkshopExpenseDescriptionRepository;
use App\Repositories\Workshop\WorkshopExpenseRepository;
use App\Repositories\Workshop\WorkshopOilWasteRepository;
use App\Repositories\Workshop\WorkshopServiceDescriptionRepositoryRepository;
use App\Repositories\Workshop\WorkshopServiceRepository;
use App\Repositories\Workshop\WorkshopServiceRevenueRepository;
use App\Repositories\Workshop\WorkshopSparepartRevenueRepository;
use App\Repositories\Workshop\WorkshopSparepartDescriptionRepository;
use App\Repositories\Workshop\WorkshopSparepartRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProdiver extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        /**
         * Cafe Revenue
         * @var ICafeRevenueRepository
         * @var CafeRevenueRepository
         */
        $this->app->bind(
            ICafeRevenueRepository::class,
            CafeRevenueRepository::class
        );

        /**
         * Workshop Expense
         * @var IWorkshopExpenseRepository
         * @var WorkshopExpenseRepository
         */
        $this->app->bind(
            IWorkshopExpenseRepository::class,
            WorkshopExpenseRepository::class
        );

        /**
         * Workshop Service
         * @var \App\Contract\Workshop\IWorkshopServiceRepository
         * @var WorkshopServiceRepository
         */

        $this->app->bind(
            IWorkshopServiceRepository::class,
            WorkshopServiceRepository::class
        );

        /**
         * Workshop Sparepart
         * @var IWorkshopSparepartRepository
         * @var WorkshopSparepartRepository
         */
        $this->app->bind(
            IWorkshopSparepartRepository::class,
            WorkshopSparepartRepository::class
        );

        /**
         * Workshop Service Revenue
         * @var IWorkshopServiceRevenueRepository
         * @var WorkshopServiceRevenueRepository
         */
        $this->app->bind(
            IWorkshopServiceRevenueRepository::class,
            WorkshopServiceRevenueRepository::class
        );

        /**
         * Workshop Service Description
         * @var IWorkshopServiceDescriptionRepository
         * @var WorkshopServiceDescriptionRepositoryRepository
         */
        $this->app->bind(
            IWorkshopServiceDescriptionRepository::class,
            WorkshopServiceDescriptionRepositoryRepository::class
        );

        /**
         * Workshop Sparepart Description
         * @var IWorkshopSparepartDescriptionRepository
         * @var WorkshopSparepartDescriptionRepository
         */
        $this->app->bind(
            IWorkshopSparepartDescriptionRepository::class,
            WorkshopSparepartDescriptionRepository::class
        );

        /**
         * Workshop Sparepart Revenue
         * @var IWorkshopSparepartRevenueRepository
         * @var WorkshopSparepartRevenueRepository
         */
        $this->app->bind(
            IWorkshopSparepartRevenueRepository::class,
            WorkshopSparepartRevenueRepository::class
        );

        /**
         * Workshop Expense
         * @var IWorkshopDescriptionRepository
         * @var WorkshopExpenseRepository
         */
        $this->app->bind(
            IWorkshopDescriptionRepository::class,
            WorkshopExpenseRepository::class
        );

        /**
         * Workshop Expense Description
         * @var IWorkshopExpenseDescriptionRepository
         * @var WorkshopExpenseDescriptionRepository
         */
        $this->app->bind(
            IWorkshopExpenseDescriptionRepository::class,
            WorkshopExpenseDescriptionRepository::class
        );

        /**
         * Workshop Oil Waste
         * @var IWorkshopDescriptionRepository
         * @var WorkshopOilWasteRepository
         */
        $this->app->bind(
            IWorkshopOilWasteRepository::class,
            WorkshopOilWasteRepository::class
        );

        /**
         * Admin
         * @var IAdminRepository
         * @var AdminRepository
         */
        $this->app->bind(
            IAdminRepository::class,
            AdminRepository::class
        );


        /**
         * WasteHouse Waste Oil
         * @var IWasteHouseWasteOilRepository
         * @var WasteHouseWasteOilRepository
         */
        $this->app->bind(
            IWasteHouseWasteOilRepository::class,
            WasteHouseWasteOilRepository::class
        );

        /**
         * WasteHouse Income
         */
        $this->app->bind(
            IWasteHouseIncomeRepository::class,
            WasteHouseIncomeRepository::class
        );

        /**
         * WasteHouse Production
         */
        $this->app->bind(
            IWasteHouseProductionRepository::class,
            WasteHouseProductionRepository::class
        );

        /**
         * WasteHouse EnergyBox
         */
        $this->app->bind(
            IWasteHouseEnergyBoxRepository::class,
            WasteHouseEnergyBoxRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
