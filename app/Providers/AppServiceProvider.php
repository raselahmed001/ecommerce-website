<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
<<<<<<< HEAD
        Model::automaticallyEagerLoadRelationships();
=======
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
    }
}
