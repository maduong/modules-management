<?php namespace Edutalk\Base\ModulesManagement\Http\Controllers;

use Edutalk\Base\Http\Controllers\BaseAdminController;
use Edutalk\Base\Support\DataTable\DataTables;
use Edutalk\Base\ModulesManagement\Http\DataTables\PluginsListDataTable;
use Edutalk\Base\ModulesManagement\Repositories\Contracts\PluginsRepositoryContract;
use Edutalk\Base\ModulesManagement\Repositories\PluginsRepository;
use Illuminate\Support\Facades\Artisan;
use Yajra\Datatables\Engines\BaseEngine;

class PluginsController extends BaseAdminController
{
    protected $module = 'edutalk-modules-management';

    protected $dashboardMenuId = 'Edutalk-plugins';

    /**
     * @param PluginsRepository $repository
     */
    public function __construct(PluginsRepositoryContract $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Get index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(PluginsListDataTable $dataTable)
    {
        $this->breadcrumbs->addLink(trans('edutalk-modules-management::base.plugins'));

        $this->setPageTitle(trans('edutalk-modules-management::base.plugins'));

        $this->getDashboardMenu($this->dashboardMenuId);

        $this->dis['dataTable'] = $dataTable->run();

        return do_filter('Edutalk-modules-plugin.index.get', $this)->viewAdmin('plugins-list');
    }

    /**
     * Set data for DataTable plugin
     * @param PluginsListDataTable|BaseEngine $dataTable
     * @return \Illuminate\Http\JsonResponse
     */
    public function postListing(PluginsListDataTable $dataTable)
    {
        return do_filter('datatables.Edutalk-modules-plugin.index.post', $dataTable, $this);
    }

    public function postChangeStatus($module, $status)
    {
        switch ((bool)$status) {
            case true:
                return modules_management()->enableModule($module)->refreshComposerAutoload();
                break;
            default:
                return modules_management()->disableModule($module)->refreshComposerAutoload();
                break;
        }
    }

    public function postInstall($alias)
    {
        $module = get_module_information($alias);

        if(!$module) {
            return response_with_messages(trans('edutalk-modules-management::base.plugin_not_exists'), true, \Constants::ERROR_CODE);
        }

        Artisan::call('module:install', [
            'alias' => $alias
        ]);

        return response_with_messages(trans('edutalk-modules-management::base.plugin_installed'));
    }

    public function postUpdate($alias)
    {
        $module = get_module_information($alias);

        if(!$module) {
            return response_with_messages(trans('edutalk-modules-management::base.plugin_not_exists'), true, \Constants::ERROR_CODE);
        }

        Artisan::call('module:update', [
            'alias' => $alias
        ]);

        return response_with_messages(trans('edutalk-modules-management::base.plugin_updated'));
    }

    public function postUninstall($alias)
    {
        $module = get_module_information($alias);

        if(!$module) {
            return response_with_messages(trans('edutalk-modules-management::base.plugin_not_exists'), true, \Constants::ERROR_CODE);
        }

        Artisan::call('module:uninstall', [
            'alias' => $alias
        ]);

        return response_with_messages(trans('edutalk-modules-management::base.plugin_uninstalled'));
    }
}
