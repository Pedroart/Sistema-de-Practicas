<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Etapa
 *
 * @property $id
 * @property $proceso_id
 * @property $tipoetapas_id
 * @property $estado_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Proceso $proceso
 * @property Tipoetapa $tipoetapa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Etapa extends Model
{
    
    static $rules = [
		'proceso_id' => 'required',
		'tipoetapas_id' => 'required',
		'estado_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proceso_id','tipoetapas_id','estado_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'estado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proceso()
    {
        return $this->hasOne('App\Models\Proceso', 'id', 'proceso_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoetapa()
    {
        return $this->hasOne('App\Models\Tipoetapa', 'id', 'tipoetapas_id');
    }
    

}
