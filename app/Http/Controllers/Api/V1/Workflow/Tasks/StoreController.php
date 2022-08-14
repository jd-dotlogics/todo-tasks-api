<?php

namespace App\Http\Controllers\Api\V1\Workflow\Tasks;

use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Jobs\Workflow\Tasks\CreateTask;
use Domains\Workflow\DataObjects\TaskObject;
use JustSteveKing\DataObjects\Facades\Hydrator;
use App\Http\Requests\Api\V1\Workflow\Tasks\StoreRequest;

class StoreController
{
    public function __invoke(StoreRequest $request): JsonResponse
    {
        dispatch(new CreateTask(
            task: Hydrator::fill(
                class: TaskObject::class,
                properties: [
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'status' => strval($request->get('status', 'open')),
                    'due' => $request->get('due') ? Carbon::parse(
                        time: strval($request->get('due')),
                    ) : null,
                    'completed' => $request->get('completed') ? Carbon::parse(
                        time: strval($request->get('completed')),
                    ) : null,
                ],
            ),
            user: intval($request->user()->id)
        ));

        return new JsonResponse(
            data: null,
            status: Http::ACCEPTED(),
        );
    }
}
