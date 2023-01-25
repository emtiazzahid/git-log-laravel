<?php

namespace EmtiazZahid\GitLogLaravel;

use Illuminate\Support\ServiceProvider;

class GitLogLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->make('EmtiazZahid\GitLogLaravel\GitLogLaravelController');

        if (method_exists($this, 'loadViewsFrom')) {
            $this->loadViewsFrom(__DIR__.'./views', 'git-log-laravel');
        }
        
        $this->app->bind('GitLogParser', function () {
            return new GitLogParser();
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        if (method_exists($this, 'package')) {
            $this->package('emtiazzahid/git-log-laravel', 'git-log-laravel', __DIR__ . '/../../');
        }

        if (method_exists($this, 'publishes')) {
            $this->publishes([
                __DIR__.'./views' => base_path('/resources/views/vendor/git-log-laravel'),
            ], 'views');
        }
    }
}
