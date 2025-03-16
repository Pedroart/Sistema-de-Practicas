<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Enlace
 *
 * @property $id
 * @property $etiqueta
 * @property $Nombre
 * @property $contenido
 * @property $archivo
 * @property $created_at
 * @property $updated_at
 *
 * @property File $file
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Enlace extends Model
{

    static $rules = [
		'etiqueta' => 'required',
		'Nombre' => 'required',
		'archivo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['etiqueta','Nombre','contenido','archivo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function file()
    {
        return $this->hasOne('App\Models\File', 'id', 'archivo');
    }


}
