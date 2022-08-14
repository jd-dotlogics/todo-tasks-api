<?php

namespace App\Jobs\Workflow\Tasks;
 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Infrastructure\Workflow\Actions\CreateNewTaskContract;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
 
class CreateTask implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;
 
    public function __construct(
        public readonly DataObjectContract $task,
        public readonly int $user,
    ) {}
 
    public function handle(CreateNewTaskContract $action): void
    {
        $action->handle(
            task: $this->task,
            user: $this->user,
        );
    }
}