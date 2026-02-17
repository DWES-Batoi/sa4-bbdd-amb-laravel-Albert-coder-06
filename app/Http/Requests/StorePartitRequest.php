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
            'local' => 'required|string|max:255|exists:equips,nom',
            'visitant' => 'required|string|max:255|exists:equips,nom|different:local',
            'data' => 'required|date',
            'estadi_id' => 'required|exists:estadis,nom',
            'jornada' => 'required|integer|min:1',
            'gols_local' => 'required|integer|min:0|max:99',
            'gols_visitant' => 'required|integer|min:0|max:99',
            'resultat' => 'nullable|string|max:255',
        ];
    }

    /**
     * Missatges d'error personalitzats
     */
    public function messages(): array
    {
        return [
            'local.exists' => 'L\'equip local no existeix a la base de dades.',
            'visitant.exists' => 'L\'equip visitant no existeix a la base de dades.',
            'visitant.different' => 'L\'equip visitant ha de ser diferent del local.',
        ];
    }
}
