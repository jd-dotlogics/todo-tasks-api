<?php

namespace App\Http\Controllers\Api\V1\Workflow\Tasks;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Workflow\Tasks\StoreRequest;
use App\Http\Resources\TaskResource;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request, Task $task)
    {
        $task->update($request->validated());

        return new JsonResponse(
            data: TaskResource::make($task),
            status: Response::HTTP_OK,
        ); 
    }
}
