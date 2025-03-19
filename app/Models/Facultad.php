<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function departamentos()
    {
        return $this->hasMany(DepartamentoAcademico::class);
    }
}
