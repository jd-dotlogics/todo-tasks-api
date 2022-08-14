<?php

namespace App\Http\Requests\Api\V1\Workflow\Tasks;

use Domains\Workflow\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
 
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'string', 'min:2', 'max:255',],
            'description' => ['bail', 'nullable', 'string', 'min:2', 'max:255',],
            'status' => ['bail', 'nullable', new Enum(TaskStatus::class),],
            'due_at' => ['bail', 'nullable', 'date',],
            'completed_at' => ['bail', 'nullable', 'date',],
        ];
    }
}
