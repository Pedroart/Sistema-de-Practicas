<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Userinstitucional
 *
 * @property $id
 * @property $codigo
 * @property $user_id
 * @property $personas_id
 * @property $escuela_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Escuela $escuela
 * @property Persona $persona
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Userinstitucional extends Model
{
    
    static $rules = [
		'codigo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','user_id','personas_id','escuela_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function escuela()
    {
        return $this->hasOne('App\Models\Escuela', 'id', 'escuela_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'personas_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
