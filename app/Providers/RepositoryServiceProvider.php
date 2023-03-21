<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Contracts\{
    GenericRepositoryInterface,
};
use App\Repository\{
    UserRepository,
    PersonRepository
};
class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepository::class,
            PersonRepository::class
        );
        $this->app->bind(
            GenericRepositoryInterface::class,
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
