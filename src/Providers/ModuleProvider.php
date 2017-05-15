<?php namespace Edutalk\Base\ModulesManagement\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Edutalk\Base\ModulesManagement\Facades\ModulesManagementFacade;
use Edutalk\Base\ModulesManagement\Http\Middleware\BootstrapModuleMiddleware;

class ModuleProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'edutalk-modules-management');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'edutalk-modules-management');
        /*Load migrations*/
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->publishes([
            __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/edutalk-modules-management',
        ], 'views');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/edutalk-modules-management'),
        ], 'lang');
        $this->publishes([
            __DIR__ . '/../../config' => base_path('config'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../../resources/themes' => base_path(),
        ], 'Edutalk-public-assets');

        app()->booted(function () {
            $this->app->register(BootstrapModuleServiceProvider::class);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Load helpers
        load_module_helpers(__DIR__);

        $this->app->register(HookServiceProvider::class);
        $this->app->register(ConsoleServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(LoadModulesServiceProvider::class);

        //Register related facades
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('ModulesManagement', ModulesManagementFacade::class);

        /**
         * @var Router $router
         */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', BootstrapModuleMiddleware::class);
    }
}
