<?php

namespace App\Http\Requests\Api\V1\Workflow\Tasks;
 
use Illuminate\Foundation\Http\FormRequest;
 
class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
 
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
        ];
    }
}
