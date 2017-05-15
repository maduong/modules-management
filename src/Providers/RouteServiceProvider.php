<?php namespace Edutalk\Base\ModulesManagement\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Edutalk\Base\ModulesManagement\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../../routes/web.php');

        Route::prefix(config('Edutalk.api_route', 'api'))
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../../routes/api.php');
    }
}
