<?php

namespace App\Providers;

use App\Contract\IProjectRepository;
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
