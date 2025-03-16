<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secpersona extends Model
{
    use HasFactory;

    protected $fillable = [
        'seccion_id',
        'supervisor_id',
        'estudiante_id',
    ];

    // Relación con la tabla 'seccions'
    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }

    // Relación con la tabla 'userinstitucionals' para el supervisor
    public function supervisor()
    {
        return $this->belongsTo(Userinstitucional::class, 'supervisor_id');
    }

    // Relación con la tabla 'userinstitucionals' para el estudiante
    public function estudiante()
    {
        return $this->belongsTo(Userinstitucional::class, 'estudiante_id');
    }
}
