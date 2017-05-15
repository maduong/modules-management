<?php
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/**
 * Admin routes
 */

$adminRoute = config('edutalk.admin_route');

$moduleRoute = 'DummyAlias';

Route::group(['prefix' => $adminRoute . '/' . $moduleRoute], function (Router $router) use ($adminRoute, $moduleRoute) {
    /**
     *
     * Put some route here
     *
     */
});
