<?php

namespace App\Providers;

use App\Interfaces\UserProfileInterface;
use App\Repositories\Repository;
use App\Repositories\Repository2;
use App\Repositories\TestInterface;
use App\Repositories\UserProfileRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     'App\Repositories\TestInterface',
        //     'App\Repositories\Repository'
        // );

        // $this->app->bind(
        //     'App\Repositories\TestInterface',
        //     'App\Repositories\Repository2'
        // );
        $this->app->bind(TestInterface::class, Repository2::class);
        $this->app->bind(UserProfileInterface::class, UserProfileRepository::class);


//$this->app->bind(RepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
