<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property $id
 * @property $name
 * @property $apellido_materno
 * @property $apellido_paterno
 * @property $dni
 * @property $ubidistrito_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Ubidistrito $ubidistrito
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Persona extends Model
{
    
    static $rules = [
		'name' => 'required',
		'apellido_materno' => 'required',
		'apellido_paterno' => 'required',
		'dni' => 'required',
		'ubidistrito_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','apellido_materno','apellido_paterno','dni','ubidistrito_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ubidistrito()
    {
        return $this->hasOne('App\Models\Ubidistrito', 'id', 'ubidistrito_id');
    }
    

}
