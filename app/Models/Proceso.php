<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proceso
 *
 * @property $id
 * @property $docente_id
 * @property $estudiante_id
 * @property $semestre_id
 * @property $estado_id
 * @property $tipoproceso_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Etapa[] $etapas
 * @property Semestre $semestre
 * @property Tipoproceso $tipoproceso
 * @property Userinstitucional $userinstitucional
 * @property Userinstitucional $userinstitucional
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proceso extends Model
{

    static $rules = [
		//'estudiante_id' => 'required',
		//'semestre_id' => 'required',
		'estado_id' => 'required',
        //'tipoproceso_id'=> 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['docente_id','estudiante_id','semestre_id','estado_id','tipoproceso_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'estado_id');
    }

    public function archivo(){
        return $this->belongsTo('App\Models\Archivo', 'id', 'proceso_id')->where('etiqueta', 'estudiante_id');
    }


    /**
     *
     */
    public function etapas()
    {
        return $this->hasMany('App\Models\Etapa', 'proceso_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function semestre()
    {
        return $this->hasOne('App\Models\Semestre', 'id', 'semestre_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoproceso()
    {
        return $this->hasOne('App\Models\Tipoproceso', 'id', 'tipoproceso_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Userinstitucional', 'id', 'docente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Userinstitucional', 'id', 'estudiante_id');
    }


}
