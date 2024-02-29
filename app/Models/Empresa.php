<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $ruc
 * @property $razon_social
 * @property $direccion
 * @property $ubidistrito_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado[] $empleados
 * @property Ubidistrito $ubidistrito
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{
    
    static $rules = [
		'ruc' => 'required',
		'razon_social' => 'required',
		'direccion' => 'required',
		'ubidistrito_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ruc','razon_social','direccion','ubidistrito_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado', 'empresa_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ubidistrito()
    {
        return $this->hasOne('App\Models\Ubidistrito', 'id', 'ubidistrito_id');
    }
    

}
