<?php

namespace App\Providers;

use App\Interfaces\IBusinessRepository;
use App\Interfaces\IBusinessTypeRepository;
use App\Repositories\BusinessRepository;
use App\Repositories\BusinessTypeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBusinessRepository::class, BusinessRepository::class);
        $this->app->bind(IBusinessTypeRepository::class, BusinessTypeRepository::class);
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