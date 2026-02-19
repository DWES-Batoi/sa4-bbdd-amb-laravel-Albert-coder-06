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

    protected $fillable = [
        'nom', 'equip_id', 'posicio', 'dorsal', 'edat',
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equip()
    {
        return $this->belongsTo(Equip::class, 'equip_id');
    }
}