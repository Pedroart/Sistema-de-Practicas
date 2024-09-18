<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsto;

class ubiprovincia extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubidepartamento_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'ubidepartamento_id',
    ];
    /**
     * Get the ubidepartamento that owns the ubiprovincia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubidepartamento(): BelongsTo
    {
        return $this->belongsTo(ubidepartamento::class);
    }

    /**
     * Get all of the ubidistrito for the ubiprovincia
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ubidistrito(): HasMany
    {
        return $this->hasMany(ubidistrito::class);
    }
}
