<?php namespace Edutalk\Base\ModulesManagement\Providers;

use Illuminate\Support\ServiceProvider;
use Edutalk\Base\ModulesManagement\Models\Plugins;
use Edutalk\Base\ModulesManagement\Repositories\Contracts\PluginsRepositoryContract;
use Edutalk\Base\ModulesManagement\Repositories\PluginsRepository;
use Edutalk\Base\ModulesManagement\Repositories\PluginsRepositoryCacheDecorator;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PluginsRepositoryContract::class, function () {
            $repository = new PluginsRepository(new Plugins());

            if (config('edutalk-caching.repository.enabled')) {
                return new PluginsRepositoryCacheDecorator($repository);
            }

            return $repository;
        });
    }
}
