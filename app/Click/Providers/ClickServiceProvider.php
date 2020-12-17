<?php


namespace App\Click\Providers;


use App\Click\Repositories\BadDomainRepositoryInterface;
use App\Click\Repositories\ClickRepositoryInterface;
use App\Click\Repositories\Eloquent\BadDomainRepository;
use App\Click\Repositories\Eloquent\ClickRepository;
use Illuminate\Support\ServiceProvider;

class ClickServiceProvider extends ServiceProvider
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
