<?php

namespace App\Repositories;

use App\Dto\RegisterDto;
use App\Models\User;

class AuthRepository
{
    /**
     * Регистрация
     *
     * @param RegisterDto $dto
     * @return User
     */
    public function register(RegisterDto $dto): User
    {
        $password = bcrypt($dto->getPassword());

        return User::create([
            'name' => $dto->getName(),
            'email' => $dto->getEmail(),
            'password' => $password
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
        $user->update([
            'password' => bcrypt($newPassword)
        ]);
    }
}
