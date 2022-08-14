<?php

namespace Domains\Workflow\Providers;
 
use Domains\Workflow\Actions\CreateNewTask;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Workflow\Actions\CreateNewTaskContract;
 
class ActionsServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreateNewTaskContract::class => CreateNewTask::class,
    ];
}