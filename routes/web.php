<?php

use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\SubcontratistaController;
use App\Http\Controllers\LogempleadoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/admin/module', function () {
    return view('admin.module');
})->name('admin.module');

Route::get('/aprobaciones', function () {
    return view('aprobaciones.index');
})->name('aprobaciones.index');
Route::get('/aprobaciones/show', function () {
    return view('aprobaciones.show');
})->name('aprobaciones.show');
Route::get('/aprobaciones/crear', function () {
    return view('aprobaciones.crear');
})->name('aprobaciones.crear');

Route::resource('empresas', EmpresaController::class)->middleware('auth');
Route::resource('empleados', EmpleadoController::class);
Route::resource('subcontratistas', SubcontratistaController::class)->middleware('auth');


Route::resource('tareas', TareaController::class);

//rutas Logempleado
Route::get('/logempleados', [LogempleadoController::class, 'index'])->name('logempleados.index');
Route::get('/logempleados/create/{id}', [LogempleadoController::class, 'create'])->name('logempleados.create');
Route::post('/logempleados', [LogempleadoController::class, 'store'])->name('logempleados.store');
Route::get('/logempleados/{id}', [LogempleadoController::class, 'show'])->name('logempleados.show');
Route::get('/logempleados/{id}/edit', [LogempleadoController::class, 'edit'])->name('logempleados.edit');
Route::put('/logempleados/{id}', [LogempleadoController::class, 'update'])->name('logempleados.update');
Route::delete('/logempleados/{id}', [LogempleadoController::class, 'destroy'])->name('logempleados.destroy');



//Link de dropzone
Route::post('/upload/{id}', [DropzoneController::class, 'upload'])->name('upload.store');
Route::delete('/destroy/{id}', [DropzoneController::class, 'destroy'])->name('upload.destroy');

