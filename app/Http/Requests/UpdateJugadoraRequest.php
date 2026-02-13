<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJugadoraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'sometimes|required|string|unique:jugadoras,nom,' . $this->route('jugadora')->id . '|max:255',
            'posicio' => 'sometimes|required|string|max:255',
            'equip' => 'sometimes|required|exists:equips,id',
        ];
    }
}
