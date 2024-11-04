<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class DropzoneController extends Controller
{

    public function upload(Request $request, $cedula)
    {
        //return response()->json($cedula);
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
        $file->storeAs($folderPath, $file->getClientOriginalName());
       
        return response()->json(['message' => 'Archivo subido exitosamente.']);
    }

}
