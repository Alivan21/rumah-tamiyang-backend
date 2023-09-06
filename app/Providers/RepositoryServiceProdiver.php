<?php

namespace App\Providers;

use App\Contract\Admin\IAdminRepository;
use App\Contract\ICafeRevenueRepository;
use App\Contract\WasteHouse\IWasteHouseWasteOilRepository;
use App\Contract\Workshop\IWorkshopDescriptionRepository;
use App\Contract\Workshop\IWorkshopExpenseRepository;
use App\Contract\Workshop\IWorkshopOilWasteRepository;
use App\Contract\Workshop\IWorkshopServiceRepository;
use App\Contract\Workshop\IWorkshopServiceRevenueRepository;
use App\Contract\Workshop\IWorkshopSparepartRevenueRepository;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\CafeRevenue\CafeRevenueRepository;
use App\Repositories\WasteHouse\WasteHouseWasteOilRepository;
use App\Repositories\Workshop\WorkshopExpenseDescriptionRepository;
use App\Repositories\Workshop\WorkshopExpenseRepository;
use App\Repositories\Workshop\WorkshopOilWasteRepository;
use App\Repositories\Workshop\WorkshopServiceDescriptionRepositoryRepository;
use App\Repositories\Workshop\WorkshopServiceRepository;
use App\Repositories\Workshop\WorkshopServiceRevenueRepository;
use App\Repositories\Workshop\WorkshopSpareparRevenueRepository;
use App\Repositories\Workshop\WorkshopSparepartDescriptionRepositoryRepository;
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
         * @var IWorkshopDescriptionRepository
         * @var WorkshopServiceDescriptionRepositoryRepository
         */
        $this->app->bind(
            IWorkshopDescriptionRepository::class,
            WorkshopServiceDescriptionRepositoryRepository::class
        );

        /**
         * Workshop Sparepart Description
         * @var IWorkshopDescriptionRepository
         * @var WorkshopSparepartDescriptionRepositoryRepository
         */
        $this->app->bind(
            IWorkshopDescriptionRepository::class,
            WorkshopSparepartDescriptionRepositoryRepository::class
        );

        /**
         * Workshop Sparepart Revenue
         * @var IWorkshopSparepartRevenueRepository
         * @var WorkshopSpareparRevenueRepository
         */
        $this->app->bind(
            IWorkshopSparepartRevenueRepository::class,
            WorkshopSpareparRevenueRepository::class
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
         * @var IWorkshopDescriptionRepository
         * @var WorkshopExpenseDescriptionRepository
         */
        $this->app->bind(
            IWorkshopDescriptionRepository::class,
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
