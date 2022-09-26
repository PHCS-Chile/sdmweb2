<div class="py-2 col-span-6 sm:col-span-3 @if(in_array($atributo_id, $requeridos) && !$respuestas[$atributo_id]) border-l-4 border-red-600 px-2 bg-red-50 @endif">
    <label for="{{ $name }}" class="block text-sm @if(in_array($atributo_id, $requeridos) && !$respuestas[$atributo_id]) text-red-600 font-bold @elseif(in_array($atributo_id, $requeridos) && $respuestas[$atributo_id]) text-green-600 font-bold @else font-medium text-gray-700 @endif @if($bloqueada) opacity-50 @endif">
        <svg xmlns="http://www.w3.org/2000/svg" class="@if(in_array($evaluacion['estado_id'], [1, 20]) && $respuestas[$atributo_id]) opacity-100 inline @else opacity-0 hidden @endif text-green-500 h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        {{ $titulo }}
    </label>
    <select id="{{ $name }}" name="{{ $name }}" wire:model="respuestas.{{ $atributo_id }}" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm disabled:opacity-50" @if($bloqueada) disabled @endif>
        <option></option>
            @foreach($opciones as $posicion => $opcion)
                <option value="{{ $opcion->id }}">{{ $opcion->name }}</option>
            @endforeach
    </select>
</div>
{{--<small class="text-red-600 font-bold">{{ $errors->first('tipogestion1') }}</small>--}}
