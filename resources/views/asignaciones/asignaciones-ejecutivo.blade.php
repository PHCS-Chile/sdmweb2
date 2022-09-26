{{--
Plantilla: asignaciones-ejecutivo
Indice de ejecutivos dentro de una asignacion
Versión 1
--}}

<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Inicio') }}</h2>
    </x-slot>

    @livewire('asignaciones-ejecutivo', ['asignacion' => $asignacion])

</x-app-layout>



