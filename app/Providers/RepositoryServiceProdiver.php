<?php

namespace App\Providers;

use App\Contract\ICafeRevenueRepository;
use App\Contract\IProjectRepository;
use App\Repositories\CafeRevenue\CafeRevenueRepository;
use App\Repositories\Project\ProjectRepository;
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
         * Project
         * @var IProjectRepository
         * @var ProjectRepository
         */
        $this->app->bind(
            IProjectRepository::class,
            ProjectRepository::class
        );

        $this->app->bind(
            ICafeRevenueRepository::class,
            CafeRevenueRepository::class
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
