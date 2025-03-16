<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Archivo
 *
 * @property $id
 * @property $proceso_id
 * @property $model_type
 * @property $id_model
 * @property $etiqueta
 * @property $created_at
 * @property $updated_at
 *
 * @property Proceso $proceso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Archivo extends Model
{

    static $rules = [
		'proceso_id' => 'required',
		'model_type' => 'required',
		'id_model' => 'required',
		'etiqueta' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proceso_id','model_type','id_model','etiqueta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proceso()
    {
        return $this->hasOne('App\Models\Proceso', 'id', 'proceso_id');
    }

    public function estudiante()
    {
        return $this->hasOne('App\Models\Userinstitucional', 'id', 'id_model');
    }

}
