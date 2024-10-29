<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subcontratista
 *
 * @property $id
 * @property $nombre
 * @property $tramo
 * @property $tipo
 * @property $nit
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Subcontratista extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'tramo', 'tipo', 'nit', 'descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany(\App\Models\Empleado::class, 'id', 'subcontratista_id');
    }
    
}
