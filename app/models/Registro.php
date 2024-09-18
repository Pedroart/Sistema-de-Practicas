<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Registro
 *
 * @property $id
 * @property $userinstitucional_id
 * @property $semestre_id
 * @property $estado_id
 * @property $comentario_id
 * @property $doc1_id
 * @property $doc2_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Comentario $comentario
 * @property Estado $estado
 * @property File $file
 * @property File $file
 * @property Semestre $semestre
 * @property Userinstitucional $userinstitucional
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Registro extends Model
{

    static $rules = [
		'semestre_id' => 'required',
		'doc1_id' => 'required',
		'doc2_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['userinstitucional_id','semestre_id','estado_id','comentario_id','doc1_id','doc2_id'];


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
    public function doc1()
    {
        return $this->hasOne('App\Models\File', 'id', 'doc1_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function doc2()
    {
        return $this->hasOne('App\Models\File', 'id', 'doc2_id');
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
