@php
//SIDEBAR DEL MAIN
    $links = [
        [
            'name' => 'Inicio',
            'url' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
            'icon' => 'fa-solid fa-bolt',
        ],
        // Puedes agregar más links aquí
        [
            'name' => 'Empresas',
            'url' => route('empresas.index'),
            'active' => request()->routeIs('empresas.index'),
            'icon' => 'fa-solid fa-building',        
        ],
        [
            'name' => 'Subcontratista',
            'url' => route('subcontratistas.index'),
            'active' => request()->routeIs('subcontratistas.index'),
            'icon' => 'fa-solid fa-industry',        
        ],

    ]
@endphp

{{-- Aquí no estamos incluyendo el layout, solo los enlaces --}}
@include('layouts.include.admin.aside', ['links' => $links])