<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstadiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'sometimes|required|string|unique:estadis,nom,' . $this->route('estadi')->id . '|max:255',
            'capacitat' => 'sometimes|required|integer|min:0',
        ];
    }
}
