<?php

namespace SimplyUnnamed\Seat\Timers;

use Seat\Services\AbstractSeatPlugin;
use SimplyUnnamed\Seat\Timers\Models\Timer;
use SimplyUnnamed\Seat\Timers\Observers\TimerObserver;

class SeatTimersServiceProvider extends AbstractSeatPlugin
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->add_routes();
        $this->add_views();
        $this->add_translations();
        $this->add_migrations();
        $this->add_publications();
        $this->registerObservers();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->mergeConfigFrom(
            __DIR__ . '/Config/timers.config.php', 'timers.config');*/

        $this->mergeConfigFrom(
            __DIR__ . '/Config/timers.sidebar.php',
            'package.sidebar'
        );

        $this->registerPermissions(__DIR__.'/Config/Permissions/timers.permissions.php', 'timers');
        $this->registerPermissions(__DIR__.'/Config/Permissions/timer-types.permissions.php', 'timers Types');

        //dd(config('package.sidebar'));
    }

    public function registerObservers(){
        Timer::observe(TimerObserver::class);
    }

    public function add_publications(){
        $this->publishes([
            //Publish Vendor files
            __DIR__.'/resources/assets/vendors/css' => public_path('web/vendors/timers/css'),
            __DIR__.'/resources/assets/vendors/js' => public_path('web/vendors/timers/js'),

            //Public Run Files
            __DIR__.'/resources/assets/js' => public_path('web/timers/js'),
            __DIR__.'/resources/assets/css'=> public_path('web/timers/css'),
        ]);
    }

    public function add_migrations(){
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    public function add_routes(){
        if (! $this->app->routesAreCached()) {
            include __DIR__ . '/Http/routes.php';
        }
    }

    public function add_translations(){
        $this->loadTranslationsFrom(__DIR__.'/lang', 'timers');
    }

    public function add_views(){
        $this->loadViewsFrom(__DIR__.'/resources/views', 'timers');
    }

    public function getName() : string
    {
        return "Timers";
    }

    public function getPackageRepositoryUrl(): string
    {
        return 'some github url';
    }

    public function getPackagistPackageName(): string
    {
        return 'SeatTimers';
    }

    public function getPackagistVendorName(): string
    {
        return 'SimplyUnnamed';
    }

    public function getVersion(): string
    {
        return '1.0';
    }
}
