<?php

namespace Zillur\WebTerminal;

use Illuminate\Support\ServiceProvider;

class WebTerminalServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/web-terminal.php',
            'web-terminal'
        );
    }

    public function boot()
    {
        // Routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Views
        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'web-terminal'
        );

        // Publish config
        $this->publishes([
            __DIR__ . '/../config/web-terminal.php' =>
            config_path('web-terminal.php'),
        ], 'web-terminal-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' =>
            resource_path('views/vendor/web-terminal'),
        ], 'web-terminal-views');
    }
}
