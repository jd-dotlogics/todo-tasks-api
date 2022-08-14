<?php

namespace Infrastructure\Workflow\Actions;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;

interface CreateNewTaskContract
{
    public function handle(DataObjectContract $task, int $user): Task|Model;
}
