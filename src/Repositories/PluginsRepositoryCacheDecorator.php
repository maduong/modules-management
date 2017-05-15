<?php namespace Edutalk\Base\ModulesManagement\Repositories;

use Edutalk\Base\Repositories\Eloquent\EloquentBaseRepositoryCacheDecorator;

use Edutalk\Base\ModulesManagement\Repositories\Contracts\PluginsRepositoryContract;

class PluginsRepositoryCacheDecorator extends EloquentBaseRepositoryCacheDecorator  implements PluginsRepositoryContract
{
    /**
     * @param $alias
     * @return mixed|null
     */
    public function getByAlias($alias)
    {
        return $this->beforeGet(__FUNCTION__, func_get_args());
    }
}
