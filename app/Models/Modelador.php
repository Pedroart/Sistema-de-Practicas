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
 * @property Tipoproceso $tipoproceso
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Modelador extends Model
{
    public static $rules = [
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
    protected $fillable = ['modelo', 'tipoetapa_id', 'item', 'dependencia_guardado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoetapa()
    {
        return $this->hasOne('App\Models\Tipoetapa', 'id', 'tipoetapa_id');
    }
}
