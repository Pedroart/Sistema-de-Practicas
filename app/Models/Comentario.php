<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 *
 * @property $id
 * @property $contenido
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comentario extends Model
{
    
    static $rules = [
		'contenido' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['contenido','user_id'];



}
