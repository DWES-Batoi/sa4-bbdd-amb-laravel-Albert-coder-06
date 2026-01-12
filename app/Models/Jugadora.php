<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * MODEL ESTADI
 */
class Jugadora extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'posicio', 'equip'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equip_rel()
    {
        return $this->belongsTo(Equip::class, 'equip');
    }
}