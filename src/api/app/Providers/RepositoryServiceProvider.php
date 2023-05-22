<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Implementations\UserRepositoryImpl;
use App\Implementations\OfferRepositoryImpl;
use App\Implementations\PromoCodeRepositoryImpl;
use App\Repositories\OfferRepository;
use App\Repositories\PromoCodeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class , function() {
            return new UserRepositoryImpl;
        });
        $this->app->bind(OfferRepository::class, function(){
            return new OfferRepositoryImpl;
        });
        $this->app->bind(PromoCodeRepository::class, function(){
            return new PromoCodeRepositoryImpl;
        });
        //
    }
}
