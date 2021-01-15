<?php

namespace Epigra\Translation;

use Bernhardh\NovaTranslationEditor\ToolServiceProvider;
use Carbon\Laravel\ServiceProvider;
use Epigra\Translation\Console\SyncTranslationsDatabase;
use Epigra\Translation\Providers\RepositoryServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(\Spatie\TranslationLoader\TranslationServiceProvider::class);
        $this->app->register(ToolServiceProvider::class);
        $this->commands(SyncTranslationsDatabase::class);
        parent::register();
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishes();
        }

        $this->mergeConfigFrom(
            __DIR__.'/../config/translation.php', 'translation'
        );
        $this->registerResources();
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }

    private function registerPublishes()
    {
        $this->publishes([
            __DIR__.'/../config/translation.php' => config_path('translation.php'),
        ], 'config');
    }
}