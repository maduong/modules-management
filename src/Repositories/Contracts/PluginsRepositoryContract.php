<?php namespace Edutalk\Base\ModulesManagement\Repositories\Contracts;

interface PluginsRepositoryContract
{
    /**
     * @param $alias
     * @return mixed|null
     */
    public function getByAlias($alias);
}
