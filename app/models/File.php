<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 * @property $id
 * @property $path
 * @property $rutafile_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Rutafile $rutafile
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class File extends Model
{

    static $rules = [
		'rutafile_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['path','rutafile_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rutafile()
    {
        return $this->hasOne('App\Models\Rutafile', 'id', 'rutafile_id');
    }
}
