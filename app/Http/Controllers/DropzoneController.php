<?php

namespace App\Http\Controllers;
use App\Models\Logarchivo;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\Debugbar\Facades\Debugbar;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class DropzoneController extends Controller
{

    public function upload(Request $request, $id)
{
    $cedula = Empleado::find($id)->cedula;
    //return response()->json($id);

    
    // Validar la solicitud
    $request->validate([
        'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // Definir la ruta de la carpeta con la cédula del empleado
    $folderPath = 'uploads/' . $cedula;

    // Crear la carpeta si no existe
    if (!Storage::exists($folderPath)) {
        Storage::makeDirectory($folderPath);
    }

    // Guardar el archivo subido
    $file = $request->file('file');
    $nombreArchivo = $file->getClientOriginalName();
    //$url = Storage::url($folderPath . '/' . $nombreArchivo); // Generar la URL pública
    $tamaño = $file->getSize(); // Obtener el tamaño del archivo en bytes
    $rutaArchivo = $folderPath . '/' . $nombreArchivo; // Ruta física al archivo en el almacenamient
    // Almacenar el archivo
    $file->storeAs($folderPath, $nombreArchivo);

    // Crear un nuevo registro en logarchivos


    $Archivo = Logarchivo::create([
        'empleado_id' => $id, 
        'nombre_archivo' => $nombreArchivo,
        'url' => $rutaArchivo,
        'fecha_subida' => now(), // Fecha y hora actual
        'tipo_archivo' => $file->getClientOriginalExtension(),
        'tamaño' => $tamaño / 1024, // Convertir a kilobytes
    ]);

    return response()->json([
        'id' => $Archivo->id,
        'message' => 'Archivo subido exitosamente.'
    ], 200);
}

    public function destroy($id)
    {
        // Encuentra el archivo en la base de datos por su ID
        $archivo = Logarchivo::findOrFail($id);
        Debugbar::info($archivo->url);
        // Elimina el archivo del almacenamiento si existe
        if (Storage::exists($archivo->url)) {
            Storage::delete($archivo->url);
        }

        // Elimina el registro del archivo en la base de datos
        $archivo->delete();

        return response()->json(['message' => 'Archivo eliminado correctamente.']);
    }

}
