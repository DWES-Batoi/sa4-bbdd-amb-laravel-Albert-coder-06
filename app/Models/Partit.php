<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * MODEL ESTADI
 */
class Partit extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'visitant_id',
        'estadi_id',
        'data',
        'jornada',
        'gols_local',
        'gols_visitant',
        'local',
        'visitant',
        'resultat'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equips()
    {
        return $this->hasMany(Equip::class);
    }
}