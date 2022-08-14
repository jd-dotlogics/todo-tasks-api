<?php

namespace Domains\Workflow\DataObjects;

use Domains\Workflow\Enums\TaskStatus;
use Illuminate\Support\Carbon;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;

class TaskObject implements DataObjectContract
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly TaskStatus $status = TaskStatus::OPEN,
        public readonly ?Carbon $due = null,
        public readonly ?Carbon $completed = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'due_at' => $this->due,
            'completed_at' => $this->completed,
        ];
    }
}
