<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedImportRequest;
use App\Services\FeedImportService;
use Illuminate\Http\JsonResponse;

class FeedImportController extends Controller
{
    public function __construct(
        protected FeedImportService $feedImportService
    ) {
    }

    /**
     * Импорт данных
     *
     * @param FeedImportRequest $request
     * @return JsonResponse
     */
    public function import(FeedImportRequest $request): JsonResponse
    {
        $dto = $request->getDto();
        $this->feedImportService->import($dto->getUrl());

        return response()->json(['message' => 'Import completed successfully']);
    }
}
