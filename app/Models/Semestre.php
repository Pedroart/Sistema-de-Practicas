<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Semestre
 *
 * @property $id
 * @property $name
 * @property $vigencia
 * @property $created_at
 * @property $updated_at
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Semestre extends Model
{
    public static $rules = [
        'name' => 'required',
        'vigencia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'vigencia'];
}
