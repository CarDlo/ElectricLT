<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logarchivo extends Model
{
    use HasFactory;

        // Definir las columnas que se pueden asignar masivamente
        protected $fillable = [
            'logempleado_id', // ID del empleado relacionado
            'nombre_archivo', // Nombre del archivo subido
            'url',            // URL del archivo
            'fecha_subida',   // Fecha en que se subió el archivo
            'tipo_archivo',   // Tipo de archivo (ej. jpg, png, pdf)
            'tamaño'          // Tamaño del archivo en kilobytes
        ];
}
