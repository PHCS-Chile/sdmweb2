<div>
    <div class="flex flex-row content-evenly">
        <label for="url" class="sr-only">URL</label>
        <input wire:model.defer="nuevoVinculo" placeholder="Agregar nuevo vínculo..." id="url" type="text" class="inline-flex w-52 py-1 px-2 mr-1 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
        <button wire:click="nuevoVinculo" class="inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm  sm:text-xs font-medium text-white bg-green-700 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
            </svg>
            Guardar
        </button>
    </div>
    @if(count($vinculos) > 0)

        <div class="flex flex-row content-evenly mt-2">
            <select wire:model="vinculoSelecionado" class="text-sm mr-2 py-0 w-2/4 border border-gray-300 rounded-md shadow-sm focus:outline-none">
                @foreach($vinculos as $posicion => $vinculo)
                    <option class="grabacion" value="{{ $posicion }}">Vínculo {{ $posicion + 1 }}</option>
                @endforeach
            </select>
            <a href="{{ $vinculos[$vinculoSelecionado]->url }}" target="_blank" class="inline-flex items-center px-2 py-1 mr-2 border border-transparent rounded-md shadow-sm  sm:text-xs font-medium text-white bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                Abrir
            </a>
            <button wire:click="eliminarVinculo({{ $vinculos[$vinculoSelecionado]->id }})" class="inline-flex items-center px-1.5 py-1 border-2 border-transparent rounded-md shadow-sm  sm:text-xs font-medium text-white bg-white text-red-500 border-red-500 hover:bg-red-500 hover:text-white transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
            </button>
        </div>
    @endif
</div>
