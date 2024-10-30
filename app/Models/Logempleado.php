<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Logempleado
 *
 * @property $id
 * @property $detalle
 * @property $estado
 * @property $condicion
 * @property $empleado_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Logempleado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['detalle', 'estado', 'condicion', 'empleado_id', 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo(\App\Models\Empleado::class, 'empleado_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
