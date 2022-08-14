<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Domains\Workflow\Providers\WorkflowServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(
            provider: WorkflowServiceProvider::class,
        );
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
