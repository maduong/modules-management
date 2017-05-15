<?php namespace Edutalk\Base\ModulesManagement\Http\Middleware;

use \Closure;

class BootstrapModuleMiddleware
{
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        dashboard_menu()->registerItem([
            'id' => 'Edutalk-plugins',
            'priority' => 1001,
            'parent_id' => null,
            'heading' => trans('edutalk-modules-management::base.admin_menu.plugins.heading'),
            'title' => trans('edutalk-modules-management::base.admin_menu.plugins.title'),
            'font_icon' => 'icon-paper-plane',
            'link' => route('admin::plugins.index.get'),
            'css_class' => null,
            'permissions' => ['view-plugins'],
        ]);

        return $next($request);
    }
}
