<?php
namespace RootYQ\Laravel\Profiler;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use RootYQ\Profiler\ProfilerManager;

class ProfilerServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * return void
     */
    public function register()
    {
        $this->app->singleton('profiler', function($app) {
            $config = $app->make('config')->get('profiler');

            return new ProfilerManager($config);
        });

        $this->app->singleton(ProfilerManager::class, function() {
            $this->app->make('profiler');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['profiler'];
    }


}