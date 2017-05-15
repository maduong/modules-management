<?php namespace Edutalk\Base\ModulesManagement\Repositories;

use Edutalk\Base\Caching\Services\Contracts\CacheableContract;
use Edutalk\Base\Caching\Services\Traits\Cacheable;
use Edutalk\Base\Repositories\Eloquent\EloquentBaseRepository;
use Edutalk\Base\ModulesManagement\Repositories\Contracts\PluginsRepositoryContract;

class PluginsRepository extends EloquentBaseRepository implements PluginsRepositoryContract, CacheableContract
{
    use Cacheable;

    /**
     * @param $alias
     * @return mixed|null
     */
    public function getByAlias($alias)
    {
        return $this->model->where('alias', '=', $alias)->first();
    }
}
