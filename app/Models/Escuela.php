<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'DepartamentoAcademico_id'];

    public function DepartamentoAcademico()
    {
        return $this->belongsTo(DepartamentoAcademico::class);
    }
}
