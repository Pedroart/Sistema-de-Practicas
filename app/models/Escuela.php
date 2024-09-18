<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'departamentoacademico_id'];

    public function departamentoacademico()
    {
        return $this->belongsTo(departamentoacademico::class);
    }
}
