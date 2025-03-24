<?php

namespace Modules\PkgWidget\Providers;

use Illuminate\Support\ServiceProvider;

class PkgWidgetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Charger les routes
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');

        // Charger les vues
        $this->loadViewsFrom(__DIR__ . '/../Views', 'PkgWidget');
    }

    public function register()
    {
        // Enregistrer d'autres services si nécessaire
    }
}
