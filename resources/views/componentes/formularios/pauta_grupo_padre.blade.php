<fieldset>
    <legend class="text-base font-medium text-gray-900">
        {{ $titulo }} - ({{ $respuestas[$padre] }})
    </legend>
    <div class="mt-2 space-y-2">
        @foreach($grupos['primarios'][$padre] as $posicion => $hijo)
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="{{ $atributos[$hijo]->name_interno }}" name="{{ $atributos[$hijo]->name_interno }}" wire:model="respuestas.{{ $hijo }}" wire: type="checkbox" value="checked" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded disabled:opacity-50" @if($bloqueada) disabled @endif>
                </div>
                <div class="ml-3 text-sm">
                    <label for="{{ $atributos[$hijo]->name_interno }}" class="font-medium @if($atributos[$hijo]->no_aplica) text-yellow-500 @elseif($atributos[$hijo]->check_ec == 1) text-red-600 @else text-gray-700 @endif @if($bloqueada) opacity-50 @endif">
                        {{ $atributos[$hijo]->name }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="@if(in_array($evaluacion['estado_id'], [1, 20]) && $respuestas[$hijo]) opacity-100 inline @else opacity-0 hidden @endif text-green-500 h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </label>
                </div>
            </div>
    @endforeach
</fieldset>
