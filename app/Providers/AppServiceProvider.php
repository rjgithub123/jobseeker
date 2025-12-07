<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\JobSeekerRepositoryInterface;
use App\Repositories\Eloquent\JobSeekerRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
     JobSeekerRepositoryInterface::class,
     JobSeekerRepository::class
   );

   $this->app->bind(
    \App\Repositories\Interfaces\JobSeekerAuthRepositoryInterface::class,
    \App\Repositories\Eloquent\JobSeekerAuthRepository::class
);

$this->app->bind(
    \App\Repositories\Interfaces\AdminAuthRepositoryInterface::class,
    \App\Repositories\Eloquent\AdminAuthRepository::class
);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
