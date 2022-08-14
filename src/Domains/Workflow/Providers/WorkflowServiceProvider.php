<?php

namespace Domains\Workflow\Providers;
 
use Illuminate\Support\ServiceProvider;
 
class WorkflowServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(
            provider: ActionsServiceProvider::class,
        );
    }
}