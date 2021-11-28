<?php

namespace Milyoona\Ipg;

use Illuminate\Support\ServiceProvider;
use Milyoona\Ipg\Core\MilyoonaIpgManager;
use Milyoona\Ipg\Facades\MilyoonaIpg;

class MilyoonaIpgServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        MilyoonaIpg::shouldProxyTo(MilyoonaIpgManager::class);

        // For load config files
        if (file_exists($this->app->basePath() . '/config/milyoona_ipg.php')) {
            $this->mergeConfigFrom($this->app->basePath() . '/config/milyoona_ipg.php', 'milyoona_ipg');
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/milyoona_ipg.php' => lumen_config_path('milyoona_ipg.php')
        ], 'milyoona_ipg');
    }
}
