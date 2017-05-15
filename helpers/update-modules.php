<?php

use \Edutalk\Base\ModulesManagement\Support\UpdateModulesSupport;
use \Edutalk\Base\ModulesManagement\Facades\UpdateModulesFacade;

if (!function_exists('register_module_update_batches')) {
    /**
     * @param $moduleAlias
     * @param array $batches
     * @return UpdateModulesSupport
     */
    function register_module_update_batches($moduleAlias, array $batches)
    {
        return UpdateModulesFacade::registerUpdateBatches($moduleAlias, $batches);
    }
}

if (!function_exists('load_module_update_batches')) {
    /**
     * @param $moduleAlias
     * @return UpdateModulesSupport
     */
    function load_module_update_batches($moduleAlias)
    {
        return UpdateModulesFacade::loadBatches($moduleAlias);
    }
}
