<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipoproceso
 *
 * @property $id
 * @property $name
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Proceso[] $procesos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipoproceso extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function procesos()
    {
        return $this->hasMany('App\Models\Proceso', 'tipoproceso_id', 'id');
    }
    

}
