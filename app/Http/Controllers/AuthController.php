<?php

namespace App\Http\Controllers;

use App\Http\Requests\{LoginRequest, RefreshPasswordRequest, RegisterRequest};
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {
    }

    /**
     * Авторизация
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (!$token = auth()->attempt($request->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->authService->createNewToken($token);
    }

    /**
     * Регистрация
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->authService->register($request->getDto());

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * Выйти
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        if (!auth()->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Обновить токен
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $token = auth()->refresh();

        return $this->authService->createNewToken($token);
    }

    /**
     * Получить данные пользователя
     *
     * @return JsonResponse
     */
    public function userProfile(): JsonResponse
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($user);
    }

    /**
     * Обновление пароля
     *
     * @param RefreshPasswordRequest $refreshPasswordRequest
     * @return JsonResponse
     */
    public function refreshPassword(RefreshPasswordRequest $refreshPasswordRequest): JsonResponse
    {
        $dto = $refreshPasswordRequest->getDto();
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $this->authService->refreshPassword($user, $dto->getNewPassword());

        return response()->json(['message' => 'Password changed successfully']);
    }
}
