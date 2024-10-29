<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\SubcontratistaController;
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