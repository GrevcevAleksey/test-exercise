<?php

namespace App\Dto;

final class RefreshPasswordDto
{
    public function __construct(
        private string $newPassword
    ) {
    }

    /**
     * @return string
     */
    public function getNewPassword(): string
    {
        return $this->newPassword;
    }
}
