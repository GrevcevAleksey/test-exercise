<?php

namespace App\Services;

use App\Dto\RegisterDto;
use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Http\JsonResponse;

class AuthService
{
    public function __construct(
        protected AuthRepository $authRepository
    ) {
    }

    /**
     * Регистрация
     *
     * @param RegisterDto $dto
     * @return User
     */
    public function register(RegisterDto $dto): User
    {
        return $this->authRepository->register($dto);
    }

    /**
     * Создание нового токена
     *
     * @param $token`
     * @return JsonResponse
     */
    public function createNewToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    /**
     * Обновление пароля
     *
     * @param User $user
     * @param string $newPassword
     */
    public function refreshPassword(User $user, string $newPassword): void
    {
        $this->authRepository->refreshPassword($user, $newPassword);
    }
}
