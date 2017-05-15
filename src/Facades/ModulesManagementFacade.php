<?php namespace Edutalk\Base\ModulesManagement\Facades;

use Illuminate\Support\Facades\Facade;

class ModulesManagementFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Edutalk\Base\ModulesManagement\Support\ModulesManagement::class;
    }
}
