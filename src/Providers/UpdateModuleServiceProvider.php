<?php namespace Edutalk\Base\ModulesManagement\Providers;

use Illuminate\Support\ServiceProvider;

class UpdateModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        register_module_update_batches('edutalk-modules-management', [

        ]);
    }

    protected function booted()
    {
        load_module_update_batches('edutalk-modules-management');
    }
}
