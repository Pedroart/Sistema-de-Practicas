<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsto;

class Ubidistrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ubiprovincia_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'ubiprovincia_id',
    ];

    /**
     * Get the ubiprovincia associated with the ubidistrito
     */
    public function ubiprovincia(): belongsto
    {
        return $this->belongsto(ubiprovincia::class);
    }
}
