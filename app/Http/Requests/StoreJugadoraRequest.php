<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJugadoraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|unique:jugadoras,nom|max:255',
            'posicio' => 'required|string|max:255',
            'equip' => 'required|exists:equips,id',
        ];
    }
}
