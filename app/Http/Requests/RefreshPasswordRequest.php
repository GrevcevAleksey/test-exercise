<?php

namespace App\Http\Requests;

use App\Dto\RefreshPasswordDto;
use Illuminate\Foundation\Http\FormRequest;

class RefreshPasswordRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'newPassword' => 'required|string|min:6'
        ];
    }

    /**
     * @return RefreshPasswordDto
     */
    public function getDto(): RefreshPasswordDto
    {
        return new RefreshPasswordDto(
            $this->get('newPassword')
        );
    }
}
