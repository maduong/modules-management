<?php namespace Edutalk\Base\ModulesManagement\Models;

use Edutalk\Base\ModulesManagement\Models\Contracts\PluginsModelContract;
use Edutalk\Base\Models\EloquentBase as BaseModel;

class Plugins extends BaseModel implements PluginsModelContract
{
    protected $table = 'plugins';

    protected $primaryKey = 'id';

    protected $fillable = [
        'alias',
        'installed_version',
        'enabled',
        'installed',
    ];

    public $timestamps = false;

    public function setEnabledAttribute($value)
    {
        $this->attributes['enabled'] = (int)!!$value;
    }

    public function setInstalledAttribute($value)
    {
        $this->attributes['installed'] = (int)!!$value;
    }
}
