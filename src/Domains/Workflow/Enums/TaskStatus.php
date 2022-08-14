<?php

declare(strict_types=1);
 
namespace Domains\Workflow\Enums;
 
enum TaskStatus: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
}
