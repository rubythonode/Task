<?php

namespace Lavalite\Task\Providers;

use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../../../resources/views', 'task');
        $this->loadTranslationsFrom(__DIR__.'/../../../../resources/lang', 'task');

        $this->publishResources();
        $this->publishMigrations();

        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('task', function ($app) {
            return $this->app->make('Lavalite\Task\Task');
        });

        $this->app->bind(
            'Lavalite\\Task\\Interfaces\\TaskRepositoryInterface',
            'Lavalite\\Task\\Repositories\\Eloquent\\TaskRepository'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('task');
    }

    /**
     * Publish resources.
     *
     * @return  void
     */
    private function publishResources()
    {
        $this->publishes([__DIR__.'/../../../../config/config.php' => config_path('package/task.php')], 'config');

        // Merge task module to task package config
        $this->mergeConfigFrom(
                __DIR__.'/../../../../config/task.php', 'task'
        );
    }

    /**
     * Publish migration and seeds.
     *
     * @return  void
     */
    private function publishMigrations()
    {
        $this->publishes([__DIR__.'/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');
        $this->publishes([__DIR__.'/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');
    }


}
