<?php

namespace Epigra\Translation\Providers;

use Epigra\Translation\Repositories\Translation\TranslationRepository;
use Epigra\Translation\Repositories\Translation\TranslationRepositoryInterface;
use Epigra\Translation\Services\Translation\TranslationService;
use Epigra\Translation\Services\Translation\TranslationServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //repositories
        $this->app->bind(TranslationRepositoryInterface::class, TranslationRepository::class);

        //services
        $this->app->bind(TranslationServiceInterface::class, TranslationService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}