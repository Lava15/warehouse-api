<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ApiErrorResponse implements Responsable
{
    public function __construct(
        private readonly string       $message,
        private readonly Response|int $status = Response::HTTP_NOT_FOUND
    )
    {
    }

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->message,
            status: $this->status,
        );
    }
}
