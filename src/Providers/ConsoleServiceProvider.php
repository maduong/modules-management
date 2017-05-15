<?php namespace Edutalk\Base\ModulesManagement\Providers;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->generatorCommands();
        $this->otherCommands();
    }

    protected function generatorCommands()
    {
        $this->commands([
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeModule::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeProvider::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeController::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeMiddleware::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeRequest::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeModel::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeRepository::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeFacade::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeService::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeSupport::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeView::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeMigration::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeCommand::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeDataTable::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeCriteria::class,
            \Edutalk\Base\ModulesManagement\Console\Generators\MakeAction::class,
        ]);
    }

    protected function otherCommands()
    {
        $this->commands([
            \Edutalk\Base\ModulesManagement\Console\Commands\InstallModuleCommand::class,
            \Edutalk\Base\ModulesManagement\Console\Commands\UpdateModuleCommand::class,
            \Edutalk\Base\ModulesManagement\Console\Commands\UninstallModuleCommand::class,
            \Edutalk\Base\ModulesManagement\Console\Commands\DisableModuleCommand::class,
            \Edutalk\Base\ModulesManagement\Console\Commands\EnableModuleCommand::class,
            \Edutalk\Base\ModulesManagement\Console\Commands\ExportModuleCommand::class,
            \Edutalk\Base\ModulesManagement\Console\Commands\GetAllModulesCommand::class,
        ]);
    }
}
