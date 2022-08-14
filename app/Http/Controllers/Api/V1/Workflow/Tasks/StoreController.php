<?php

namespace App\Http\Controllers\Api\V1\Workflow\Tasks;

use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use App\Jobs\Workflow\Tasks\CreateTask;
use Domains\Workflow\DataObjects\TaskObject;
use JustSteveKing\DataObjects\Facades\Hydrator;
use App\Http\Requests\Api\V1\Workflow\Tasks\StoreRequest;
use Illuminate\Http\Response;

class StoreController
{
    public function __invoke(StoreRequest $request): JsonResponse
    {
        dispatch(new CreateTask(
            task: Hydrator::fill(
                class: TaskObject::class,
                properties: array_filter($request->validated()),
            ),
            user: intval($request->user()->id)
        ));

        return new JsonResponse(
            data: null,
            status: Response::HTTP_ACCEPTED,
        );
    }
}
