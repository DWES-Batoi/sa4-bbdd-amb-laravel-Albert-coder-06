<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'local' => 'sometimes|required|string|max:255',
            'visitant' => 'sometimes|required|string|max:255',
            'data' => 'sometimes|required|date',
            'resultat' => 'nullable|string|max:255',
        ];
    }
}
