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
            'name' => 'Consultar',
            'url' => route('aprobaciones.show'),
            'active' => request()->routeIs('aprobaciones.show'),
            'icon' => 'fa-solid fa-magnifying-glass',        
        ],
        [
            'name' => 'Empleados',
            'url' => route('empleados.index'),
            'active' => request()->routeIs('empleados.index'),
            'icon' => 'fa-solid fa-user-plus',        
        ],

    ]
@endphp

{{-- Aquí no estamos incluyendo el layout, solo los enlaces --}}
@include('layouts.include.admin.aside', ['links' => $links])