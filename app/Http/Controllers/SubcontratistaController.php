<?php

namespace App\Http\Controllers;

use App\Models\Subcontratista;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SubcontratistaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SubcontratistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $subcontratistas = Subcontratista::paginate();

        return view('subcontratista.index', compact('subcontratistas'))
            ->with('i', ($request->input('page', 1) - 1) * $subcontratistas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $subcontratista = new Subcontratista();

        return view('subcontratista.create', compact('subcontratista'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcontratistaRequest $request): RedirectResponse
    {
        Subcontratista::create($request->validated());

        return Redirect::route('subcontratistas.index')
            ->with('success', 'Subcontratista created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $subcontratista = Subcontratista::find($id);

        return view('subcontratista.show', compact('subcontratista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $subcontratista = Subcontratista::find($id);

        return view('subcontratista.edit', compact('subcontratista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubcontratistaRequest $request, Subcontratista $subcontratista): RedirectResponse
    {
        $subcontratista->update($request->validated());

        return Redirect::route('subcontratistas.index')
            ->with('success', 'Subcontratista updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Subcontratista::find($id)->delete();

        return Redirect::route('subcontratistas.index')
            ->with('success', 'Subcontratista deleted successfully');
    }
}
