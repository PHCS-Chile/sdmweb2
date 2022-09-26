    {{--
    Plantilla: asignaciones-estudio
    Lista de asignaciones para un estudio
    Versión 1
    --}}

    <x-app-layout>

        {{-- Header --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Inicio') }}</h2>
        </x-slot>

        {{-- Contenido TODO: Este IF está bien feo --}}
        
        @if($subestudio)
            @livewire('asignaciones-estudio', ['estudio' => $estudio, 'subestudio' => $subestudio])
        @else
            @livewire('asignaciones-estudio', ['estudio' => $estudio])
        @endif
        
    </x-app-layout>



