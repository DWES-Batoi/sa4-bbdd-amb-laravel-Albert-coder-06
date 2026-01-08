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

    protected $fillable = ['local', 'visitant', 'data', 'resultat'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equips()
    {
        return $this->hasMany(Equip::class);
    }
}