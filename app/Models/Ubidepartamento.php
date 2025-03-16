<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Ubidepartamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get all of the ubiprovincia for the ubidepartamento
     */
    public function ubiprovincia(): HasMany
    {
        return $this->hasMany(ubiprovincia::class);
    }
}
