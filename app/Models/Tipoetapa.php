<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipoetapa
 *
 * @property $id
 * @property $name
 * @property $tipoproceso_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipoetapa extends Model
{
    
    static $rules = [
		'name' => 'required',
		'tipoproceso_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','tipoproceso_id'];

    public function tipoproceso(){
      return $this->belongsTo(Tipoproceso::class);
    }
    
}
