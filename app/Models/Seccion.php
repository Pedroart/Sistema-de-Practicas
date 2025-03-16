<?php

namespace App\Models;

use App\Models\Secpersona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'docente_id',
        'semestre_id'
    ];

    /**
     * Get the docente that owns the Seccion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Userinstitucional', 'id', 'docente_id');
    }

    public function semestre()
    {
        return $this->hasOne('App\Models\Semestre', 'id', 'semestre_id');
    }

    public function secpersonas()
    {
        return $this->hasMany(Secpersona::class, 'seccion_id');
    }
}
