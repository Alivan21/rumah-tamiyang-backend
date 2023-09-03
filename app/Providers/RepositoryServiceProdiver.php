<?php

namespace App\Providers;

use App\Contract\ICafeRevenueRepository;
use App\Contract\IWorkshopSparepartRepository;
use App\Contract\Workshop\IWorkshopExpenseRepository;
use App\Contract\Workshop\IWorkshopServiceDescriptionRepository;
use App\Contract\Workshop\IWorkshopServiceRepository;
use App\Contract\Workshop\IWorkshopServiceRevenueRepository;
use App\Contract\Workshop\IWorkshopSparepartDescriptionRepository;
use App\Contract\Workshop\IWorkshopSparepartRevenueRepository;
use App\Repositories\CafeRevenue\CafeRevenueRepository;
use App\Repositories\Workshop\WorkshopExpenseRepository;
use App\Repositories\Workshop\WorkshopServiceDescriptionRepositoryRepository;
use App\Repositories\Workshop\WorkshopServiceRepository;
use App\Repositories\Workshop\WorkshopServiceRevenueRepository;
use App\Repositories\Workshop\WorkshopSpareparRevenueRepository;
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
         * @var WorkshopSparepartDescriptionRepositoryRepository
         */
        $this->app->bind(
            IWorkshopSparepartDescriptionRepository::class,
            WorkshopSparepartDescriptionRepository::class
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
