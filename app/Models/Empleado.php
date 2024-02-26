<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $name
 * @property $apellido_paterno
 * @property $apellido_materno
 * @property $genero
 * @property $grado_instruccion
 * @property $cargo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'name' => 'required',
		'apellido_paterno' => 'required',
		'apellido_materno' => 'required',
		'genero' => 'required',
		'grado_instruccion' => 'required',
		'cargo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','apellido_paterno','apellido_materno','genero','grado_instruccion','cargo'];



}
