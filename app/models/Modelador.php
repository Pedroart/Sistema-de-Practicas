<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modelador
 *
 * @property $id
 * @property $indicador
 * @property $tipoproceso_id
 * @property $model_type
 * @property $json_data
 * @property $created_at
 * @property $updated_at
 *
 * @property Tipoproceso $tipoproceso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Modelador extends Model
{
    
    static $rules = [
		'indicador' => 'required',
		'model_type' => 'required',
		'json_data' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['indicador','tipoproceso_id','model_type','json_data'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoproceso()
    {
        return $this->hasOne('App\Models\Tipoproceso', 'id', 'tipoproceso_id');
    }
    

}
