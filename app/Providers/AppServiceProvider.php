<?php

namespace App\Providers;

use App\Contracts\StatisticRepositoryInterface;
use App\Contracts\PatientRepositoryInterface;
use App\Contracts\VisitRepositoryInterface;
use App\Repositories\PatientRepository;
use App\Repositories\StatisticRepository;
use App\Repositories\VisitRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(VisitRepositoryInterface::class, VisitRepository::class);
        $this->app->bind(StatisticRepositoryInterface::class, StatisticRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
