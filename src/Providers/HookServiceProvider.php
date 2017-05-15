<?php namespace Edutalk\Base\ModulesManagement\Providers;

use Illuminate\Support\ServiceProvider;
use Edutalk\Base\ModulesManagement\Hook\RegisterDashboardStats;

class HookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        add_action(EDUTALK_DASHBOARD_STATS, [RegisterDashboardStats::class, 'handle'], 22);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
