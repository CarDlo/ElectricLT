<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $cedula
 * @property $nombre
 * @property $apellidos
 * @property $cargo
 * @property $estado
 * @property $condicion
 * @property $empresa_id
 * @property $subcontratista_id
 * @property $user_id
 * @property $fechaRetiro
 * @property $fechaAprobacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa $empresa
 * @property Subcontratista $subcontratista
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'nombre', 'apellidos', 'cargo', 'estado', 'condicion', 'empresa_id', 'subcontratista_id', 'user_id', 'fechaRetiro', 'fechaAprobacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcontratista()
    {
        return $this->belongsTo(\App\Models\Subcontratista::class, 'subcontratista_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
