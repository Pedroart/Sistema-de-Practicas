<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Matricula
 *
 * @property $id
 * @property $userinstitucional_id
 * @property $semestre_id
 * @property $estado_id
 * @property $comentario_id
 * @property $matricula_id
 * @property $record_id
 * @property $created_at
 * @property $updated_at
 * @property Comentario $comentario
 * @property Estado $estado
 * @property File $file
 * @property File $file
 * @property Semestre $semestre
 * @property Userinstitucional $userinstitucional
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Matricula extends Model
{
    public static $rules = [
        'semestre_id' => 'required',
        'matricula_id' => 'required',
        'record_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['userinstitucional_id', 'semestre_id', 'estado_id', 'comentario_id', 'matricula_id', 'record_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function comentario()
    {
        return $this->hasOne('App\Models\Comentario', 'id', 'comentario_id');
    }

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
    public function matricula()
    {
        return $this->hasOne('App\Models\File', 'id', 'matricula_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function record()
    {
        return $this->hasOne('App\Models\File', 'id', 'record_id');
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
    public function userinstitucional()
    {
        return $this->hasOne('App\Models\Userinstitucional', 'id', 'userinstitucional_id');
    }
}
