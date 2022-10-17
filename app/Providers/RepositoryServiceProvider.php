<?php

namespace App\Providers;

use App\Interfaces\IBranchRepository;
use App\Interfaces\IBusinessRepository;
use App\Interfaces\IBusinessTypeRepository;
use App\Interfaces\ICurrencyRepository;
use App\Interfaces\ILanguageRepository;
use App\Interfaces\IServiceTypesRepository;
use App\Repositories\BranchRepository;
use App\Repositories\BusinessRepository;
use App\Repositories\BusinessTypeRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\ServiceTypesRepository;
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
        $this->app->bind(IBranchRepository::class, BranchRepository::class);
        $this->app->bind(ILanguageRepository::class, LanguageRepository::class);
        $this->app->bind(ICurrencyRepository::class, CurrencyRepository::class);
        $this->app->bind(IServiceTypesRepository::class, ServiceTypesRepository::class);
        
        // Product repository
        $this->app->bind(IProductRepository::class, ProductRepository::class);
        // Unit repository
        $this->app->bind(IUnitRepository::class, UnitRepository::class);
        // Category repository
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        // Brand repository
        $this->app->bind(IBrandRepository::class, BrandRepository::class);
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