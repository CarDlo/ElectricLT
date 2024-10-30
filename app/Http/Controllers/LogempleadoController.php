<?php

namespace App\Http\Controllers;

use App\Models\Logempleado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LogempleadoRequest;
use App\Models\Empleado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LogempleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $logempleados = Logempleado::paginate();

        return view('logempleado.index', compact('logempleados'))
            ->with('i', ($request->input('page', 1) - 1) * $logempleados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id): View
    {
        $empleado = Empleado::find($id);

        return view('logempleado.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LogempleadoRequest $request): RedirectResponse
    {
        Logempleado::create($request->validated());

        return Redirect::route('logempleados.index')
            ->with('success', 'Logempleado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $logempleado = Logempleado::find($id);

        return view('logempleado.show', compact('logempleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $logempleado = Logempleado::find($id);

        return view('logempleado.edit', compact('logempleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LogempleadoRequest $request, Logempleado $logempleado): RedirectResponse
    {
        $logempleado->update($request->validated());

        return Redirect::route('logempleados.index')
            ->with('success', 'Logempleado updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Logempleado::find($id)->delete();

        return Redirect::route('logempleados.index')
            ->with('success', 'Logempleado deleted successfully');
    }
}
