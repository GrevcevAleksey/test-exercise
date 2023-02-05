<?php

namespace App\Http\Requests;

use App\Dto\RegisterDto;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6'
        ];
    }

    /**
     * @return RegisterDto
     */
    public function getDto(): RegisterDto
    {
        return new RegisterDto(
            $this->get('name'),
            $this->get('email'),
            $this->get('password'),
        );
    }
}
