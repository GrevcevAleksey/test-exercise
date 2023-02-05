<?php

namespace App\Http\Requests;

use App\Dto\FeedImportDto;
use Illuminate\Foundation\Http\FormRequest;

class FeedImportRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'url' => 'required|url'
        ];
    }

    /**
     * @return FeedImportDto
     */
    public function getDto()
    {
        return new FeedImportDto(
            $this->get('url')
        );
    }
}
