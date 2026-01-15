<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'local' => 'required|string|max:255',
            'visitant' => 'required|string|max:255',
            'data' => 'required|date',
            'resultat' => 'nullable|string|max:255',
        ];
    }
}
