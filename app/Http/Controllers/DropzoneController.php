<?php

namespace App\Http\Controllers;
use App\Models\Logarchivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class DropzoneController extends Controller
{

    public function upload(Request $request, $cedula)
{
    $id = $request->input('id');
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
    $url = Storage::url($folderPath . '/' . $nombreArchivo); // Generar la URL pública
    $tamaño = $file->getSize(); // Obtener el tamaño del archivo en bytes

    // Almacenar el archivo
    $file->storeAs($folderPath, $nombreArchivo);

    // Crear un nuevo registro en logarchivos
    Logarchivo::create([
        'logempleado_id' => $id, 
        'nombre_archivo' => $nombreArchivo,
        'url' => $url,
        'fecha_subida' => now(), // Fecha y hora actual
        'tipo_archivo' => $file->getClientOriginalExtension(),
        'tamaño' => $tamaño / 1024, // Convertir a kilobytes
    ]);

   // return response()->json(['message' => 'Archivo subido exitosamente.']);
}

}
