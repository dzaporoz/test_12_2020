<?php


namespace App\Tracking\Providers;


use App\Tracking\TrackingService;
use App\Tracking\TrackingServiceInterface;
use App\Tracking\Repositories\BadDomainRepositoryInterface;
use App\Tracking\Repositories\ClickRepositoryInterface;
use App\Tracking\Repositories\Eloquent\BadDomainRepository;
use App\Tracking\Repositories\Eloquent\ClickRepository;
use Illuminate\Support\ServiceProvider;

class TrackingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BadDomainRepositoryInterface::class, BadDomainRepository::class);
        $this->app->bind(ClickRepositoryInterface::class, ClickRepository::class);
        $this->app->bind(TrackingServiceInterface::class, TrackingService::class);
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
