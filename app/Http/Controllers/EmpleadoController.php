<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\Subcontratista;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $empleados = Empleado::all();
        $empresas = Empresa::all();
        $subcontratistas = Subcontratista::all();

        return view('empleado.index', compact('empleados', 'empresas', 'subcontratistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $empresas = Empresa::all();
        $subcontratistas = Subcontratista::all();

        return view('empleado.create', compact( 'empresas', 'subcontratistas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpleadoRequest $request): RedirectResponse
    {
        
        

        // Reasignar valores al request
        $data = $request->validated();
        $data['estado'] = 'Pendiente';
        $data['user_id'] = Auth::user()->id;
        $data['condicion'] = 'Activo';

        // Crear el registro con todos los datos
        Empleado::create($data);


        return Redirect::route('empleados.index')
        ->with('mensaje', 'Se creo la aprobacion correctamente')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $empleado = Empleado::find($id);

        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpleadoRequest $request, Empleado $empleado): RedirectResponse
    {
        $empleado->update($request->validated());

        return Redirect::route('empleados.index')
            ->with('success', 'Empleado updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Empleado::find($id)->delete();

        return Redirect::route('empleados.index')
            ->with('success', 'Empleado deleted successfully');
    }
}
