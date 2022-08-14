<?php

namespace Domains\Workflow\DataObjects;

use Domains\Workflow\Enums\TaskStatus;
use Illuminate\Support\Carbon;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;

class TaskObject implements DataObjectContract
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly TaskStatus $status,
        public readonly null|Carbon $due,
        public readonly null|Carbon $completed,
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
