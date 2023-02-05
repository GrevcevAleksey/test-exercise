<?php

namespace App\Dto;

final class FeedImportDto
{
    public function __construct(
        private string $url
    ) {
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
