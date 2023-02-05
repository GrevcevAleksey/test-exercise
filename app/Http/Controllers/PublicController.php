<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PublicController extends Controller
{
    /**
     * Публичный API метод
     *
     * @return JsonResponse
     */
    public function public(): JsonResponse
    {
        return response()->json(['message' => 'success']);
    }
}
